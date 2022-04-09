@extends('layouts.user')

@section('content')
    <div class="grid md:grid-cols-4 py-4">

        $thrift_groups = UserThriftGroup::where('user_id', auth()->id())->select('user_id', 'thrift_group_id', 'created_at')
        ->with('thrift_group', function ($query) {
        $query->select('id', 'user_id', 'token', 'name', 'thrifters', 'total_amount');
        })->paginate(10);
        {{-- Each Group --}}
        @foreach ($thrift_groups as $group)
            <a href=""
                class="max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-sm hover:shadow-lg shadow-blue-300 hover:shadow-blue-300 dark:bg-gray-800">

                <div class="px-6 py-4">
                    <h1 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">{{ $group->thrift_group->name }}
                    </h1>
                    <ul class="list-circle">
                        <li>{{ $group->thrift_group->thrifters }}</li>
                        <li>{{ $group->thrift_group->total_amount }}</li>
                        <li>{{ $group->created_at }}</li>
                    </ul>
                </div>
            </a>
        @endforeach
        {{-- Each Group --}}
    </div>
@endsection
