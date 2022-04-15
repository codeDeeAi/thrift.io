<?php

namespace App\Http\Controllers\Thrift\Activities;

use App\Http\Controllers\Controller;
use App\Models\ThriftActivity;
use App\Models\ThriftGroup;
use Illuminate\Http\Request;

class ThriftActivityController extends Controller
{
    // Get all activities
    public function index(Request $request, $token)
    {
        $group = ThriftGroup::where('token', $token)->select('id')->first();

        $activities = ThriftActivity::where('thrift_group_id', $group->id)
            ->select('id', 'details', 'created_at')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.thrift.activities.index', ['activities' => $activities]);
    }
}
