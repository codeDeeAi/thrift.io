<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\ThriftActivity;
use App\Models\ThriftGroup;
use App\Models\UserThriftGroup;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    // Show User Dashboard
    public function index(Request $request)
    {
        $created_user_groups_count = count(ThriftGroup::where('user_id', auth()->id())->get('id'));
        $user_groups_count = count(UserThriftGroup::where('user_id', auth()->id())->select('id')->get());
        $team_members = 0;
        foreach (ThriftGroup::where('user_id', auth()->id())->get('id') as $my_group) {
            $team_members += (count(UserThriftGroup::where('thrift_group_id', $my_group->id)->select('id')->get()) - 1);
        }
        $latest_group_records = UserThriftGroup::where('user_id', auth()->id())->latest()->take(2)
            ->select('user_id', 'thrift_group_id')->with('thrift_group', function ($query) {
                $query->select(
                    'id',
                    'token',
                    'name',
                    'thrifters',
                    'amount',
                    'total_amount',
                    'start_date',
                    'schedule'
                );
            })->get();
        $recent_activities = [];
        foreach ($latest_group_records as $item) {
            $each_acts = ThriftActivity::where('thrift_group_id', $item->thrift_group->id)->latest()->take(5)
                ->get(['details', 'created_at'])->toArray();
            $recent_activities = array_merge($recent_activities, $each_acts);
        }
        return view('user.overview.dashboard', [
            'created_user_groups' => $created_user_groups_count,
            'user_groups' => $user_groups_count,
            'team_members' => $team_members,
            'recent_groups' => $latest_group_records,
            'recent_activities' => $recent_activities,
        ]);
    }
}
