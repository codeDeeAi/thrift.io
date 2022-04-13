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
            {{-- @if (auth()->id() === $members->first()->thrift_group->user_id)
                <button
                    class="h-10 px-2 py-1 -mb-px text-sm text-center hover:text-blue-600 capitalize bg-transparent hover:border-b-2 hover:border-blue-500 sm:text-base dark:border-blue-400 dark:text-blue-300 whitespace-nowrap focus:outline-none">
                    Invite / Add Members
                </button>
            @endif --}}

        </div>
        {{-- Headers Ends --}}

        {{-- Add Members Area --}}

        {{-- @if (auth()->id() === $members->first()->thrift_group->user_id)
            <div class="py-2">
                <x-auth.form.label for="add_user" :value="__('Add User')" />

                <x-auth.form.input id="add_user" class="block mt-1 lg:w-2/6 w-1/2" type="email" name="add_user" value=""
                    required autofocus />
            </div>
        @endif --}}
        {{-- Add Members Area Ends --}}

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        {{-- Content --}}
        <div class="py-4 flex justify-center gap-3">
            <div class="shadow-sm rounded-lg p-3 overflow-auto border">
                <p class="font-bold h3 mb-1">My Slots</p>
                <div class="overflow-hidden overflow-x-auto border border-gray-100 rounded">
                    <table class="min-w-full text-sm divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Created</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Status</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Is Fixed</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Payment Date
                                </th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Comment</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Options</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            @foreach ($slots as $slot)
                                <form
                                    action="{{ route('user.thrift.slot.update', ['token' => $thrift_group->token, 'id' => $slot->id]) }}"
                                    method="POST">
                                    @csrf

                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $slot->created_at }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap capitalize">
                                            {{ $slot->status }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap"> <select name="is_movable"
                                                id="is_movable" value="{{ $slot->is_movable }}"
                                                class="block w-full px-8 py-2 text-base placeholder-gray-300 transition 
                                            duration-500 ease-in-out transform border border-transparent rounded-lg text-neutral-600
                                            bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 
                                            focus:ring-offset-gray-300 capitalize">
                                                @php
                                                    $open_values = [1, 0];
                                                @endphp
                                                @foreach ($open_values as $val)
                                                    @if ($val === $slot->is_movable)
                                                        <option value="{{ $val }}" selected>
                                                            {{ $val == 0 ? 'Yes' : 'No' }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $val }}">
                                                            {{ $val == 0 ? 'Yes' : 'No' }}
                                                        </option>
                                                    @endif
                                                @endforeach

                                            </select></td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $slot->slot_date }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                            <input type="text" name="comment" id="comment" value="{{ $slot->comment }}"
                                                class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm" />
                                        </td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                            <button
                                                class="flex items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                                <svg class="w-5 h-5 mx-1" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span class="mx-1">Update</span>
                                            </button>
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
    </div>
@endsection
