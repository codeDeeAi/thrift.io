@extends('layouts.user')

@section('content')
    @php
    $tabs = ['slots', 'members', 'overview', 'activities', 'settings'];
    @endphp
    <div>
        {{-- Headers --}}
        <div class="flex justify-end border-b border-gray-200 dark:border-gray-700">
            @foreach ($tabs as $tab)
                @if ($tab == 'slots')
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

        </div>
        {{-- Headers Ends --}}

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        {{-- Content --}}
        <div class="py-4 flex justify-center gap-3">
            <div class="shadow-sm rounded-lg p-3 overflow-auto border">
                <p class="font-bold h3 mb-1">Activities</p>
                <div class="overflow-hidden overflow-x-auto border border-gray-100 rounded">
                    <table class="min-w-full text-sm divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Created</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Details</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Options</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            @foreach ($activities as $activity)
                                <form action="" method="POST">
                                    @csrf

                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $activity->created_at }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                            @foreach ($activity->details as $detail)
                                                <p>{{ $detail }}</p>
                                            @endforeach
                                        </td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                            ...
                                        </td>
                                    </tr>
                                </form>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Content Ends --}}
        {{-- Pagination --}}
        {{ $activities->links() }}
        {{-- Pagination Ends --}}
    </div>
@endsection
