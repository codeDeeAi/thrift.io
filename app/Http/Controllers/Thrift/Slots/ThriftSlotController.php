<?php

namespace App\Http\Controllers\Thrift\Slots;

use App\Http\Controllers\Controller;
use App\Models\ThriftGroup;
use App\Models\ThriftSlot;
use App\Models\UserThriftGroup;
use Illuminate\Http\Request;

class ThriftSlotController extends Controller
{
    // Show Thrift Slots
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
                ->select('id', 'user_id', 'thrift_group_id', 'slot_date', 'status', 'is_movable', 'comment')->with('user', function ($query) {
                    $query->select('id', 'name', 'email');
                })->get();

            return view('user.thrift.slots.index', ['members' => $members, 'thrift_group' => $thrift_group, 'slots' => $slots]);
        }

        return back();
        // return view('user.thrift.settings.index', ['settings' => $settings]);
    }

    // Store and Update Slots
    public function store(Request $request, $token)
    {
        $this->validate($request, [
            'slots_data' => 'required|string'
        ]);

        $slot_data = json_decode($request->slots_data,true);

        dd($slot_data);
    }
}
