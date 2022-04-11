<?php

namespace App\Http\Controllers\Thrift\Members;

use App\Http\Controllers\Controller;
use App\Models\ThriftGroup;
use App\Models\UserThriftGroup;
use Illuminate\Http\Request;

class ThriftMembersController extends Controller
{
    // Get All members
    public function index(Request $request, $token)
    {
        $group_id = ThriftGroup::where('token', $token)->first('id');
        $members = UserThriftGroup::where('thrift_group_id', $group_id->id)
            ->select('id', 'user_id', 'thrift_group_id', 'created_at')
            ->with(['user' => function ($query) {
                $query->select('id', 'name', 'email');
            }, 'thrift_group' => function ($query) {
                $query->select('id', 'user_id');
            }])->paginate(10);

        return view('user.thrift.members.index', ['members' => $members]);
    }
}
