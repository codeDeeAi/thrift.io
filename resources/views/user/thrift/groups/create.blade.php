@extends('layouts.user')

@section('content')
    <div class="container">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        'details' => 'nullable|json',
        <form action="{{ route('user.thrift.groups.create') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <x-auth.form.label for="name" :value="__('Name')" />

                <x-auth.form.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Number of thrifters -->
            <div>
                <x-auth.form.label for="thrifters" :value="__('Number of Thrifters')" />

                <x-auth.form.input id="thrifters" class="block mt-1 w-full" type="number" min="1" name="thrifters"
                    :value="old('thrifters')" required autofocus />
            </div>

            <!-- Amount -->
            <div>
                <x-auth.form.label for="amount" :value="__('Thrifter Amount')" />

                <x-auth.form.input id="amount" class="block mt-1 w-full" type="number" min="1" name="amount"
                    :value="old('amount')" required autofocus />
            </div>


            <!-- Is Thrift Open for Registeration -->
            <div class="flex items-center">
                <input id="is_open" name="is_open" type="checkbox"
                    class=" w-4 h-4 text-blue-600 border-gray-200 rounded focus:ring-blue-500">
                <label for="is_open" class="block ml-2 text-sm text-neutral-600"> Is thrift open
                </label>
            </div>
            <div>
                <button type="submit"
                    class=" flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Create </button>
            </div>
        </form>
    </div>
@endsection
