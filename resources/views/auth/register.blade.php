@extends('layouts.guest')
@section('content')
    <section>
        <div class="flex min-h-screen overflow-hidden">
            <div class=" flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
                <div class="w-full max-w-xl mx-auto lg:w-96">
                    <div>
                        <a href="/" class="text-blue-600 text-medium">Thrift.io</a>
                        <h2 class="mt-6 text-3xl font-extrabold text-neutral-600"> Create Account </h2>
                    </div>
                    <div class="mt-8">
                        <div class="mt-6">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form action="#" method="POST" class="space-y-6">
                                @csrf

                                <!-- Name Address -->
                                <div>
                                    <x-auth.form.label for="email" :value="__('Name')" />

                                    <x-auth.form.input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus />
                                </div>

                                <!-- Email Address -->
                                <div>
                                    <x-auth.form.label for="email" :value="__('Email')" />

                                    <x-auth.form.input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autofocus />
                                </div>

                                <!-- Password -->
                                <div class="mt-4">
                                    <x-auth.form.label for="password" :value="__('Password')" />

                                    <x-auth.form.input id="password" class="block mt-1 w-full" type="password"
                                        name="password" required autocomplete="current-password" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-auth.form.label for="password_confirmation" :value="__('Confirm Password')" />

                                    <x-auth.form.input id="password_confirmation" class="block mt-1 w-full" type="password"
                                        name="password_confirmation" required />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                        href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                </div>
                                <div>
                                    <button type="submit"
                                        class=" flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Sign Up </button>
                                </div>

                            </form>
                            <div class="relative my-4">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 bg-white text-neutral-600"> Or continue with </span>
                                </div>
                            </div>
                            <div>
                                <button type="submit"
                                    class=" w-full items-center block px-10 py-3.5 text-base font-medium text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                    <div class="flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            class="w-6 h-6" viewBox="0 0 48 48">
                                            <defs>
                                                <path id="a"
                                                    d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z">
                                                </path>
                                            </defs>
                                            <clipPath id="b">
                                                <use xlink:href="#a" overflow="visible"></use>
                                            </clipPath>
                                            <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"></path>
                                            <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z">
                                            </path>
                                            <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z">
                                            </path>
                                            <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"></path>
                                        </svg>
                                        <span class="ml-4"> Sign Up with Google</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative flex-1 hidden w-0 overflow-hidden lg:block">
                <img class="absolute inset-0 object-cover w-full h-full"
                    src="https://images.unsplash.com/photo-1616763355603-9755a640a287?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                    alt="">
            </div>
        </div>
    </section>
@endsection
