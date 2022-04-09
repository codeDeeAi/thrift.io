@extends('layouts.user')

@section('content')
    <div class="flex justify-end">
        <a class="inline-block px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-indigo-600 rounded-lg active:text-indigo-500 hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring"
            href="{{ route('user.thrift.groups.create') }}">
            Create Group
        </a>

        </a>
    </div>
    @if ($thrift_groups->count() < 1)
        <p class="text-center py-4">
            No groups have been created yet, click on the "Create Group button" to add thrift groups
        </p>
    @endif
    <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-4 py-4">
        {{-- Each Group --}}
        @foreach ($thrift_groups as $group)
            <a href=""
                class="max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-sm hover:shadow-lg shadow-blue-300 hover:shadow-blue-300 dark:bg-gray-800 mb-3">

                <div class="px-6 py-4">
                    <h1 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">{{ $group->thrift_group->name }}
                    </h1>
                    <ul class="list-circle text-sm">
                        <li>Members : {{ $group->thrift_group->thrifters }}</li>
                        <li>NGN {{ $group->thrift_group->total_amount }}</li>
                        <li>Joined : {{ $group->created_at }}</li>
                    </ul>
                </div>
            </a>
        @endforeach
        {{-- Each Group --}}
    </div>
@endsection
