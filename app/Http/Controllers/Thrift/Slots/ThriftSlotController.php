<?php

namespace App\Http\Controllers\Thrift\Slots;

use App\Enums\ThriftActivityType;
use App\Enums\ThriftSchedule;
use App\Enums\ThriftSlotStatus;
use App\Http\Controllers\Controller;
use App\Models\ThriftGroup;
use App\Models\ThriftSlot;
use App\Models\User;
use App\Models\UserThriftGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThriftSlotController extends Controller
{
    // Show Thrift Slots Settings
    public function index(Request $request, $token)
    {
        $thrift_group = ThriftGroup::where('token', $token)->select('id', 'user_id', 'token', 'name', 'thrifters', 'start_date', 'schedule', 'slot_positions')->first();
        if ($thrift_group->user_id === auth()->id()) {
            $members = UserThriftGroup::where('thrift_group_id', $thrift_group->id)
                ->select('id', 'user_id', 'thrift_group_id', 'created_at')
                ->with('user', function ($query) {
                    $query->select('id', 'name', 'email');
                })->get();

            $slots = ThriftSlot::where('thrift_group_id', $thrift_group->id)
                ->select('id', 'user_id', 'thrift_group_id', 'slot_date', 'status', 'is_movable', 'created_at')->with('user', function ($query) {
                    $query->select('id', 'name', 'email');
                })->get();

            return view('user.thrift.slots.index', ['members' => $members, 'thrift_group' => $thrift_group, 'slots' => $slots]);
        }

        return abort(404);
        // return view('user.thrift.settings.index', ['settings' => $settings]);
    }

    // Show User Thrift Slots
    public function show(Request $request, $token)
    {
        $thrift_group = ThriftGroup::where('token', $token)->select('id', 'user_id', 'token', 'name', 'thrifters', 'start_date', 'schedule', 'slot_positions')->first();

        $slots = ThriftSlot::where('thrift_group_id', $thrift_group->id)->where('user_id', auth()->id())
            ->select('id', 'user_id', 'thrift_group_id', 'slot_date', 'status', 'is_movable', 'created_at', 'comment')->get();

        return view('user.thrift.slots.show', ['thrift_group' => $thrift_group, 'slots' => $slots]);
    }

    // Show User Thrift Slots status
    public function showStatus(Request $request, $token)
    {
        $thrift_group = ThriftGroup::where('token', $token)->select('id', 'user_id', 'token', 'name', 'thrifters', 'start_date', 'schedule', 'slot_positions')->first();

        $slots = ThriftSlot::where('thrift_group_id', $thrift_group->id)
            ->select('id', 'user_id', 'thrift_group_id', 'slot_date', 'status', 'is_movable', 'created_at')
            ->with('user', function ($query) {
                $query->select('id', 'name', 'email');
            })
            ->get();

        return view('user.thrift.slots.status', ['thrift_group' => $thrift_group, 'slots' => $slots]);
    }

    // Update User Thrift Slot
    public function update(Request $request, $token, $id)
    {
        $this->validate($request, [
            'comment' => 'nullable|string',
            'is_movable' => 'required|boolean'
        ]);

        ThriftSlot::where('id', $id)->update([
            'comment' => $request->comment,
            'is_movable' => (ThriftSlot::where('id', $id)->where('status', ThriftSlotStatus::PAID)->exists()) ? 0 : $request->is_movable
        ]);

        create_activity($token, ThriftActivityType::SLOT_STATUS, auth()->user()->name);

        return back()->with('status', 'Updated succesfully !');
    }
    // Update User Thrift Slot Status
    public function statusUpdate(Request $request, $token, ThriftSlot $thrift_slot)
    {
        $this->validate($request, [
            'status' => 'required|in:' . implode(",", ThriftSlotStatus::getAll())
        ]);

        if ($thrift_slot->status === ThriftSlotStatus::PAID) {
            return back();
        };

        $thrift_slot->update([
            'status' => $request->status
        ]);

        create_activity($token, ThriftActivityType::PAYMENT_STATUS, User::where('id', $thrift_slot->user_id)->first()->name);

        return back()->with('status', 'Updated succesfully !');
    }

    // Store and Update Slots
    public function store(Request $request, $token)
    {
        $this->validate($request, [
            'slots_data' => 'required|string'
        ]);

        $slot_data = json_decode($request->slots_data, true); // Array

        $thrift_group = ThriftGroup::where('token', $token)->first();

        if (count($slot_data) != $thrift_group->thrifters) {
            return back()->withErrors(['message' => 'Slot Data cannot be less than or exceed ' . $thrift_group->thrifters]);
        }

        $final_slot_data = [];
        $slot_ids = [];
        $thrift_start_date_array = explode('-', $thrift_group->start_date);
        $thrift_start_year = $thrift_start_date_array[0];
        $thrift_start_month = $thrift_start_date_array[1];
        $thrift_start_day = $thrift_start_date_array[2];

        foreach ($slot_data as $index => $item) {
            // Calculate date   
            $interval = $index + 1;
            $new_date = Carbon::createFromDate($thrift_start_year, $thrift_start_month, $thrift_start_day);
            if ($thrift_group->schedule == ThriftSchedule::DAILY) {
                $new_date->addDays($interval);
            }
            if ($thrift_group->schedule == ThriftSchedule::WEEKLY) {
                $new_date->addWeeks($interval);
            }
            if ($thrift_group->schedule == ThriftSchedule::MONTHLY) {
                $new_date->addMonths($interval);
            }

            $new_date = Carbon::createFromFormat('Y-m-d H:i:s', $new_date)->format('Y-m-d');

            if ($item['is_new'] == true) {
                // Create new thrift slot 
                $slot = ThriftSlot::create([
                    'user_id' => $item['user_id'],
                    'thrift_group_id' => $thrift_group->id,
                    'slot_date' => $new_date,
                    'status' => ThriftSlotStatus::UNPAID,
                    'comment' => (isset($item['comment'])) ? $item['comment'] : null
                ]);

                // Create new slot template
                array_push($final_slot_data, [
                    'position' => $index + 1,
                    'thrift_slot_id' => $slot->id
                ]);

                array_push($slot_ids, $slot->id); // Save slot ids
            } else {
                // Check Position
                $slot = ThriftSlot::where('id', $item['slot']['id'])
                    ->update([
                        'slot_date' => $new_date
                    ]);
                // Create new slot template
                array_push($final_slot_data, [
                    'position' => $index + 1,
                    'thrift_slot_id' => $item['slot']['id']
                ]);

                array_push($slot_ids, $item['slot']['id']); // Save slot ids
            }
        }

        // Remove deleted slots
        $all_thrift_slots = ThriftSlot::where('thrift_group_id', $thrift_group->id)->select('id')->get();

        foreach ($all_thrift_slots as $value) {
            if (!in_array($value['id'], $slot_ids)) {
                ThriftSlot::where('id', $value['id'])->delete();
            }
        }

        // dd($final_slot_data);

        // Save thrift group data
        $saved = ThriftGroup::where('id', $thrift_group->id)->update([
            'slot_positions' => json_encode($final_slot_data)
        ]);

        create_activity($token, ThriftActivityType::CHANGED_SLOTS);

        return back()->with('status', 'Slots updated successfully');
    }
}
