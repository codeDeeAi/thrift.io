<?php

namespace App\Http\Controllers\Thrift\Groups;

use App\Http\Controllers\Controller;
use App\Http\Requests\Thrift\Group\ThriftGroupFormRequest;
use App\Models\ThriftGroup;
use App\Models\UserThriftGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThriftGroupController extends Controller
{
    // Get User Thrift Groups
    public function index()
    {
        $thrift_groups = UserThriftGroup::where('user_id', auth()->id())->select('user_id', 'thrift_group_id', 'created_at')
            ->with('thrift_group', function ($query) {
                $query->select('id', 'user_id', 'token', 'name', 'thrifters', 'total_amount');
            })->paginate(10);

        return view('user.thrift.groups.index', ['thrift_groups' => $thrift_groups]);
    }

    // Create new thrift group
    public function store(ThriftGroupFormRequest $request)
    {
        DB::beginTransaction();
        try {
            $group = ThriftGroup::create([
                'user_id' => auth()->id(),
                // 'token',
                'name' => $request->name,
                'trifters' => $request->thrifters,
                'amount' => $request->amount,
                'total_amount' => $request->amount * $request->thrifters,
                'details' => $request->details,
                'is_open' => $request->is_open,
            ]);

            UserThriftGroup::create([
                'user_id' => auth()->id(),
                'thrift_group_id' => $group->id,
            ]);

            DB::commit();

            return route('user.thrift.groups');
            
        } catch (\Throwable $th) {

            return back();
        }
    }
}
