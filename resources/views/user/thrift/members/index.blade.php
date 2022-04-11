@extends('layouts.user')

@section('content')
    @php
    $tabs = ['members', 'overview', 'activities', 'settings'];
    @endphp
    <div x-data="{ current_tab: 'activity' }">
        {{-- Headers --}}
        <div class="flex justify-end border-b border-gray-200 dark:border-gray-700">
            @foreach ($tabs as $tab)
                @if ($tab == 'members')
                    <button disabled 
                        class="h-10 px-2 py-1 -mb-px text-sm text-center text-blue-600 capitalize bg-transparent border-b-2 border-blue-500 sm:text-base dark:border-blue-400 dark:text-blue-300 whitespace-nowrap focus:outline-none">
                        {{ $tab }}
                    </button>
                @else
                    <button 
                        class="h-10 px-2 py-1 -mb-px text-sm text-center hover:text-blue-600 capitalize bg-transparent hover:border-b-2 hover:border-blue-500 sm:text-base dark:border-blue-400 dark:text-blue-300 whitespace-nowrap focus:outline-none">
                        {{ $tab }}
                    </button>
                @endif
            @endforeach
            @if (auth()->id() === $members->first()->thrift_group->user_id)
                <button x-for="tab in tabs"
                    class="h-10 px-2 py-1 -mb-px text-sm text-center hover:text-blue-600 capitalize bg-transparent hover:border-b-2 hover:border-blue-500 sm:text-base dark:border-blue-400 dark:text-blue-300 whitespace-nowrap focus:outline-none">
                    Invite / Add Members
                </button>
            @endif

        </div>
        {{-- Headers Ends --}}

        {{-- Content --}}
        {{-- Thrifters --}}
        <div class="py-4">
            <div class="overflow-hidden overflow-x-auto border border-gray-100 rounded">
                <table class="min-w-full text-sm divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Name</th>
                            <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Email</th>
                            <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Joined</th>
                            <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Badge</th>
                            <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Options</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @foreach ($members as $member)
                            <tr>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $member->user->name }}</td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $member->user->email }}</td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $member->created_at }}</td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    @if ($member->thrift_group->user_id === $member->user_id)
                                        <strong
                                            class="border text-green-500 border-current uppercase px-2 py-1 rounded-full text-[10px] tracking-wide">
                                            Admin
                                        </strong>
                                    @else
                                        <strong
                                            class="border text-blue-500 border-current uppercase px-2 py-1 rounded-full text-[10px] tracking-wide">
                                            Member
                                        </strong>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">...</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Thrifters Ends --}}

        {{-- Pagination --}}
        <x-pagination.pagination></x-pagination.pagination>
        {{-- Pagination Ends --}}
        {{-- Content Ends --}}
    </div>
@endsection
