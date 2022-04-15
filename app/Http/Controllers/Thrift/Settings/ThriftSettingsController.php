<?php

namespace App\Http\Controllers\Thrift\Settings;

use App\Enums\ThriftActivityType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Thrift\Group\ThriftGroupFormRequest;
use App\Models\ThriftGroup;
use Illuminate\Http\Request;

class ThriftSettingsController extends Controller
{
    // Get Thrift settings
    public function index(Request $request, $token)
    {
        $settings = ThriftGroup::where('token', $token)->first();
        return view('user.thrift.settings.index', ['settings' => $settings]);
    }

    // Update Thrift settings
    public function update(ThriftGroupFormRequest $request, $token)
    {
        ThriftGroup::where('token', $token)->where('user_id', auth()->id())->update([
            'name' => $request->name,
            'thrifters' => $request->thrifters,
            'amount' => $request->amount,
            'total_amount' => $request->amount * $request->thrifters,
            'schedule' => $request->schedule,
            'start_date' => $request->start_date,
            'details' => $request->details,
            'is_open' => $request->is_open,
        ]);

        create_activity($token, ThriftActivityType::GROUP_OPEN);

        return back()->with('status', 'Settings updated succesfully');
    }
}
