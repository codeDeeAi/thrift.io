@extends('layouts.guest')
@section('content')
    <div class="flex justify-around p-4">

        <section class="bg-white dark:bg-gray-800">
            <div class="container px-6 py-8 mx-auto">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-3xl text-center  font-bold text-gray-800 dark:text-gray-100">Simple, transparent
                            pricing</h2>
                        <p class="mt-4 text-center text-gray-500 dark:text-gray-400">No Contracts. No surprise fees.</p>
                    </div>
                </div>

                <div class="flex justify-center mt-16 ">
                    {{-- Free Plan --}}
                    <div class="px-6 py-4 transition-colors duration-200 transform bg-gray-700 rounded-lg dark:bg-gray-600">
                        <p class="text-lg font-medium text-gray-100">Free</p>
                        <h4 class="mt-2 text-4xl font-semibold text-gray-100">$0 <span
                                class="text-base font-normal text-gray-400">/ Month</span></h4>
                        <p class="mt-4 text-gray-300">For all users and organizations</p>

                        <div class="mt-8 space-y-8">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="mx-4 text-gray-300">Unlimited Thrift groups</span>
                            </div>

                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="mx-4 text-gray-300">Unlimited thrift members</span>
                            </div>

                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="mx-4 text-gray-300">Thrift analytics</span>
                            </div>
                        </div>
                        <div class="flex py-4">
                            <a href="{{ route('register') }}"
                                class="w-full px-4 py-2 mt-10 font-medium tracking-wide text-center text-white capitalize transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                Start Now
                            </a>
                        </div>
                    </div>
                    {{-- Free Plan Ends --}}
                </div>
            </div>
        </section>
    </div>
@endsection
