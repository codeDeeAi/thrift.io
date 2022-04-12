<?php

namespace App\Http\Controllers\Thrift\Groups;

use App\Http\Controllers\Controller;
use App\Models\ThriftGroup;
use Illuminate\Http\Request;

class ThriftRegistrationController extends Controller
{
    // Get Registration Page
    public function index(Request $request, $token)
    {
        if (ThriftGroup::where('token', $token)->exists()) {
            $thrift_group = ThriftGroup::where('token', $token)->first(['token', 'name', 'amount', 'is_open', 'schedule']);
            return view('guest.thrift.registration.index', ['thrift_group' => $thrift_group]);
        }
        abort(404);
    }
}
