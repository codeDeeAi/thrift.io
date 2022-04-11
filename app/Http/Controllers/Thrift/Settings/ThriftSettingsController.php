<?php

namespace App\Http\Controllers\Thrift\Settings;

use App\Http\Controllers\Controller;
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
}
