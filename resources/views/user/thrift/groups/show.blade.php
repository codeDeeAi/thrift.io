@extends('layouts.user')

@section('content')
    @php
    $tabs = ['activity', 'thrifters', 'settings'];
    @endphp
    <div x-data="{ current_tab: 'activity' }">
        {{-- Headers --}}
        <div class="flex border-b border-gray-200 dark:border-gray-700">
            @foreach ($tabs as $tab)
                <button
                    class="h-10 px-2 py-1 -mb-px text-sm text-center text-blue-600 capitalize bg-transparent border-b-2 border-blue-500 sm:text-base dark:border-blue-400 dark:text-blue-300 whitespace-nowrap focus:outline-none">
                    {{ $tab }}
                </button>
            @endforeach

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
                            <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Date of Birth</th>
                            <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Role</th>
                            <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Salary</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">John Doe</td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap">24/05/1995</td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap">Web Developer</td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap">$120,000</td>
                        </tr>

                        <tr>
                            <td class="px-4 py-2 font-medium whitespace-nowrap">Jane Doe</td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap">04/11/1980</td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap">Web Designer</td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap">$100,000</td>
                        </tr>

                        <tr>
                            <td class="px-4 py-2 font-medium whitespace-nowrap">Gary Barlow</td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap">24/05/1995</td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap">Singer</td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap">$20,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Thrifters Ends --}}

        {{-- Content Ends --}}
        {{ $data }}
    </div>
@endsection
