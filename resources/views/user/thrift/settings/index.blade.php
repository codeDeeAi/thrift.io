@extends('layouts.user')

@section('content')
    @php
    $tabs = ['settings', 'members', 'overview', 'activities'];
    @endphp
    <div x-data="{ current_tab: 'activity' }">
        {{-- Headers --}}
        <div class="flex justify-end border-b border-gray-200 dark:border-gray-700">
            @foreach ($tabs as $tab)
                @if ($tab == 'settings')
                    <button disabled
                        class="h-10 px-2 py-1 -mb-px text-sm text-center text-blue-600 capitalize bg-transparent border-b-2 border-blue-500 sm:text-base dark:border-blue-400 dark:text-blue-300 whitespace-nowrap focus:outline-none">
                        {{ $tab }}
                    </button>
                @else
                    <a href="{{ route('user.thrift.' . $tab, ['token' => $settings->token]) }}"
                        class="h-10 px-2 py-1 -mb-px text-sm text-center hover:text-blue-600 capitalize bg-transparent hover:border-b-2 hover:border-blue-500 sm:text-base dark:border-blue-400 dark:text-blue-300 whitespace-nowrap focus:outline-none">
                        {{ $tab }}
                    </a>
                @endif
            @endforeach
        </div>
        {{-- Headers Ends --}}

        {{-- Content --}}
        {{-- Settings --}}
        <div class="py-8">
            <section class="">
                <div class="max-w-screen-md px-4 mx-auto sm:px-6 lg:px-8">
                    <div class="">
                        <div class="p-8 rounded-lg lg:p-12 shadow lg:col-span-3">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <!-- Share Link -->
                            <div>
                                <x-auth.form.label for="share_link" :value="__('Group Link')" />

                                <div class="flex gap-3">
                                    <x-auth.form.input id="share_link" class="block mt-1 w-full" type="text" disabled
                                        name="share_link"
                                        value="{{ route('thrift.group.registration', ['token' => $settings->token]) }}"
                                        required autofocus />

                                    <button onclick="copyLink()"
                                        class="flex items-center px-2 py-1 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                        <svg class="w-5 h-5 mx-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="mx-1">Copy</span>
                                    </button>
                                </div>
                            </div>
                            <form action="{{ route('user.thrift.settings', ['token' => $settings->token]) }}"
                                method="POST" class="space-y-4">
                                @csrf

                                <!-- Name -->
                                <div>
                                    <x-auth.form.label for="name" :value="__('Name')" />

                                    <x-auth.form.input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="$settings->name" required autofocus />
                                </div>

                                <!-- Thrifters -->
                                <div>
                                    <x-auth.form.label for="thrifters" :value="__('Thrifters (No of members)')" />

                                    <x-auth.form.input id="thrifters" class="block mt-1 w-full" type="number"
                                        name="thrifters" :value="$settings->thrifters" min="1" required autofocus />
                                </div>

                                <!-- Amount -->
                                <div>
                                    <x-auth.form.label for="amount" :value="__('Amount (per member)')" />

                                    <x-auth.form.input id="amount" class="block mt-1 w-full" type="number" name="amount"
                                        :value="$settings->amount" min="1" required autofocus />
                                </div>

                                <!-- Total Amount -->
                                <div>
                                    <x-auth.form.label for="total_amount" :value="__('Total Amount')" />

                                    <x-auth.form.input id="total_amount" class="block mt-1 w-full" type="number"
                                        name="amount" :value="$settings->amount * $settings->thrifters" min="1" required disabled autofocus />
                                </div>

                                <!-- Start Date -->
                                <div>
                                    <x-auth.form.label for="start_date" :value="__('Start Date')" />

                                    <x-auth.form.input id="start_date" class="block mt-1 w-full" type="date"
                                        name="start_date" value="{{ $settings->start_date }}" required autofocus />
                                </div>

                                <div class="grid grid-cols-2 gap-8">
                                    <!-- Thrift schedule -->
                                    <div>
                                        <x-auth.form.label for="schedule" :value="__('Thrift Schedule')" />

                                        <div class="">
                                            @php
                                                $schedules = App\Enums\ThriftSchedule::getAll();
                                            @endphp

                                            <select name="schedule" id="schedule" value="{{ $settings->schedule }}"
                                                class="block w-full px-5 py-3 text-base placeholder-gray-300 transition 
                                                duration-500 ease-in-out transform border border-transparent rounded-lg text-neutral-600
                                                bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 
                                                focus:ring-offset-gray-300 capitalize">
                                                @foreach ($schedules as $schedule)
                                                    @if ($settings->schedule === $schedule)
                                                        <option value="{{ $schedule }}" selected>{{ $schedule }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $schedule }}">{{ $schedule }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Group active -->
                                    <div>
                                        <x-auth.form.label for="is_open" :value="__('Is group open for member registrations ?')" />
                                        <select name="is_open" id="is_open" value="{{ $settings->is_open }}"
                                            class="block w-full px-5 py-3 text-base placeholder-gray-300 transition 
                                        duration-500 ease-in-out transform border border-transparent rounded-lg text-neutral-600
                                        bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 
                                        focus:ring-offset-gray-300 capitalize">
                                            @php
                                                $open_values = [1, 0];
                                            @endphp
                                            @foreach ($open_values as $val)
                                                @if ($val === $settings->is_open)
                                                    <option value="{{ $val }}" selected>
                                                        {{ $val == 1 ? 'Yes' : 'No' }}
                                                    </option>
                                                @else
                                                    <option value="{{ $val }}"> {{ $val == 1 ? 'Yes' : 'No' }}
                                                    </option>
                                                @endif
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                                {{-- Submit --}}
                                <div class="flex justify-end">
                                    <button
                                        class="flex items-center px-2 py-2.5 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                        <svg class="w-5 h-5 mx-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="mx-1">Update Settings</span>
                                    </button>
                                </div>
                                {{-- Submit Ends --}}
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        {{-- Settings Ends --}}
        {{-- Content Ends --}}
    </div>
    <script>
        const members = document.getElementById('thrifters');
        const amount = document.getElementById('amount');
        const total_amount = document.getElementById('total_amount');
        const share_link = document.getElementById('share_link');

        members.addEventListener('change', (event) => {
            calculateTotalAmount()
        });
        amount.addEventListener('change', (event) => {
            calculateTotalAmount()
        });

        function calculateTotalAmount() {
            total_amount.value = members.value * amount.value;
        }

        // Copy Share Link 
        function copyLink() {
            /* Select the text field */
            share_link.select();
            share_link.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(share_link.value);

            /* Alert the copied text */
            alert("Copied share link: " + share_link.value);
        }
    </script>
@endsection
