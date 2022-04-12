@extends('layouts.user')

@section('content')
    {{-- Create Group --}}
    <div class="py-8">
        <section class="">
            <div class="max-w-screen-md px-4 mx-auto sm:px-6 lg:px-8">
                <div class="">
                    <div class="p-8 rounded-lg lg:p-12 shadow lg:col-span-3">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form action="{{ route('user.thrift.groups.create') }}" method="POST" class="space-y-4">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-auth.form.label for="name" :value="__('Name')" />

                                <x-auth.form.input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus />
                            </div>

                            <!-- Thrifters -->
                            <div>
                                <x-auth.form.label for="thrifters" :value="__('Thrifters (No of members)')" />

                                <x-auth.form.input id="thrifters" class="block mt-1 w-full" type="number" name="thrifters"
                                    :value="old('thrifters')" min="1" required autofocus />
                            </div>

                            <!-- Amount -->
                            <div>
                                <x-auth.form.label for="amount" :value="__('Amount (per member)')" />

                                <x-auth.form.input id="amount" class="block mt-1 w-full" type="number" name="amount"
                                    :value="old('amount')" min="1" required autofocus />
                            </div>

                            <!-- Total Amount -->
                            <div>
                                <x-auth.form.label for="total_amount" :value="__('Total Amount')" />

                                <x-auth.form.input id="total_amount" class="block mt-1 w-full" type="number" name="amount"
                                    :value="old('amount') * old('thrifters')" min="1" required disabled autofocus />
                            </div>

                            <!-- Start Date -->
                            <div>
                                <x-auth.form.label for="start_date" :value="__('Start Date')" />

                                <x-auth.form.input id="start_date" class="block mt-1 w-full" type="date" name="start_date"
                                    :value="old('start_date')" required autofocus />
                            </div>

                            <div class="grid grid-cols-2 gap-8">
                                <!-- Thrift schedule -->
                                <div>
                                    <x-auth.form.label for="schedule" :value="__('Thrift Schedule')" />

                                    <div class="">
                                        @php
                                            $schedules = App\Enums\ThriftSchedule::getAll();
                                        @endphp

                                        <select name="schedule" id="schedule" value="{{ old('schedule') }}"
                                            class="block w-full px-5 py-3 text-base placeholder-gray-300 transition 
                                        duration-500 ease-in-out transform border border-transparent rounded-lg text-neutral-600
                                        bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 
                                        focus:ring-offset-gray-300 capitalize">
                                            @foreach ($schedules as $schedule)
                                                <option value="{{ $schedule }}">{{ $schedule }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Group active -->
                                <div>
                                    <x-auth.form.label for="is_open" :value="__('Is group open for member registrations ?')" />

                                    <select name="is_open" id="is_open" value="{{ old('is_open') }}"
                                        class="block w-full px-5 py-3 text-base placeholder-gray-300 transition 
                                        duration-500 ease-in-out transform border border-transparent rounded-lg text-neutral-600
                                        bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 
                                        focus:ring-offset-gray-300 capitalize">
                                        @php
                                            $open_values = [1, 0];
                                        @endphp
                                        @foreach ($open_values as $val)
                                            <option value="{{ $val }}"> {{ $val == 1 ? 'Yes' : 'No' }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            {{-- Submit --}}
                            <div>
                                <button type="submit"
                                    class=" flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Create </button>
                            </div>
                            {{-- Submit Ends --}}
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- Create Group Ends --}}
    <script>
        const members = document.getElementById('thrifters');
        const amount = document.getElementById('amount');
        const total_amount = document.getElementById('total_amount');

        members.addEventListener('change', (event) => {
            calculateTotalAmount()
        });
        amount.addEventListener('change', (event) => {
            calculateTotalAmount()
        });

        function calculateTotalAmount() {
            total_amount.value = members.value * amount.value;
        }
    </script>
@endsection
