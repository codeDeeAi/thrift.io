@extends('layouts.user')
@section('content')
    <div class="py-4 lg:flex gap-6 overflow-y-auto px-4">
        {{-- Container One --}}
        <div class="lg:w-4/6 h-full px-2 space-y-10">
            {{-- Cards --}}
            <div class="grid md:grid-cols-2 gap-6">
                <a class="relative block p-8 bg-gradient-to-r from-red-400 to-orange-300 shadow-xl rounded-xl" href="">
                    <span
                        class="absolute right-4 top-4 rounded-full px-3 py-1.5 bg-green-100 text-green-600 font-medium text-xs">
                        4.3
                    </span>

                    <div class="mt-4 text-gray-500 sm:pr-8">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                            </path>
                        </svg>

                        <h5 class="mt-4 text-xl font-bold text-gray-900">Science of Chemstry</h5>

                        <p class="hidden mt-2 text-sm sm:block">
                            You can manage phone, email and chat conversations all from a single mailbox.
                        </p>
                    </div>
                </a>
                <a class="relative block p-8 bg-gradient-to-r from-purple-300 to-purple-400 shadow-xl rounded-xl" href="">
                    <span
                        class="absolute right-4 top-4 rounded-full px-3 py-1.5 bg-green-100 text-green-600 font-medium text-xs">
                        4.3
                    </span>

                    <div class="mt-4 text-gray-500 sm:pr-8">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                            </path>
                        </svg>

                        <h5 class="mt-4 text-xl font-bold text-gray-900">Science of Chemstry</h5>

                        <p class="hidden mt-2 text-sm sm:block">
                            You can manage phone, email and chat conversations all from a single mailbox.
                        </p>
                    </div>
                </a>
            </div>
            {{-- Cards Ends --}}

            {{-- Activities --}}
            <div class="">
                <p class="h2 font-bold text-lg capitalize">Monthly Tasks</p>
                <div class="flex justify-end gap-3">
                    <div class="overflow-hidden p-0.5 text-xs border rounded-full dark:border-gray-700">
                        <div class="sm:-mx-0.5 flex">
                            <button
                                class=" focus:outline-none px-3 w-1/2 sm:w-auto py-1 sm:mx-0.5 text-white bg-blue-500 rounded-full">Monthly</button>
                            <button
                                class=" focus:outline-none px-3 w-1/2 sm:w-auto py-1 sm:mx-0.5 text-gray-800 dark:text-gray-200 dark:hover:bg-gray-700 bg-transparent rounded-full hover:bg-gray-200">Yearly</button>
                        </div>
                    </div>
                </div>
                {{-- Tabs --}}
                <div class="flex border-b border-gray-200 dark:border-gray-700">
                    <button
                        class="h-10 px-4 py-2 -mb-px text-sm text-center text-blue-600 bg-transparent border-b-2 border-blue-500 sm:text-base dark:border-blue-400 dark:text-blue-300 whitespace-nowrap focus:outline-none">
                        Profile
                    </button>

                    <button
                        class="h-10 px-4 py-2 -mb-px text-sm text-center text-gray-700 bg-transparent border-b-2 border-transparent sm:text-base dark:text-white whitespace-nowrap cursor-base focus:outline-none hover:border-gray-400">
                        Account
                    </button>

                    <button
                        class="h-10 px-4 py-2 -mb-px text-sm text-center text-gray-700 bg-transparent border-b-2 border-transparent sm:text-base dark:text-white whitespace-nowrap cursor-base focus:outline-none hover:border-gray-400">
                        Notification
                    </button>
                </div>
                {{-- Tabs Ends --}}
                {{-- Lists --}}
                <section class="mt-6">
                    <ul class="list-none space-y-6">
                        <li>
                            <a href="#!" class="w-full flex gap-6 lg:gap-12 justify-between">
                                <div class="flex gap-4">
                                    <div class="p-2 border rounded-lg justify-center my-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="grid">
                                        <p class="h3 font-bold text-sm capitalize">Uber</p>
                                        <p class="text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Ratione, veritatis
                                            officia. Dolor, nam quia consequatur voluptatum vel tempora illo veritatis.</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex -space-x-1 overflow-hidden my-auto">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                    </div>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="w-full flex gap-6 lg:gap-12 justify-between">
                                <div class="flex gap-4">
                                    <div class="p-2 border rounded-lg justify-center my-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="grid">
                                        <p class="h3 font-bold text-sm capitalize">Uber</p>
                                        <p class="text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Ratione, veritatis
                                            officia. Dolor, nam quia consequatur voluptatum vel tempora illo veritatis.</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex -space-x-1 overflow-hidden my-auto">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                    </div>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="w-full flex gap-6 lg:gap-12 justify-between">
                                <div class="flex gap-4">
                                    <div class="p-2 border rounded-lg justify-center my-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="grid">
                                        <p class="h3 font-bold text-sm capitalize">Uber</p>
                                        <p class="text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Ratione, veritatis
                                            officia. Dolor, nam quia consequatur voluptatum vel tempora illo veritatis.</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex -space-x-1 overflow-hidden my-auto">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                    </div>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="w-full flex gap-6 lg:gap-12 justify-between">
                                <div class="flex gap-4">
                                    <div class="p-2 border rounded-lg justify-center my-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="grid">
                                        <p class="h3 font-bold text-sm capitalize">Uber</p>
                                        <p class="text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Ratione, veritatis
                                            officia. Dolor, nam quia consequatur voluptatum vel tempora illo veritatis.</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex -space-x-1 overflow-hidden my-auto">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                    </div>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="w-full flex gap-6 lg:gap-12 justify-between">
                                <div class="flex gap-4">
                                    <div class="p-2 border rounded-lg justify-center my-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="grid">
                                        <p class="h3 font-bold text-sm capitalize">Uber</p>
                                        <p class="text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Ratione, veritatis
                                            officia. Dolor, nam quia consequatur voluptatum vel tempora illo veritatis.</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex -space-x-1 overflow-hidden my-auto">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
                                            alt="">
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                    </div>

                                </div>
                            </a>
                        </li>
                    </ul>
                </section>
                {{-- Lists Ends --}}
            </div>
            {{-- Activities Ends --}}
        </div>
        {{-- Container One Ends --}}
        {{-- Container Two --}}
        <div class="lg:w-2/6 h-full mt-3 lg:mt-0 lg:px-16 space-y-20">
            <div class="space-y-6">
                <p class="h2 font-bold text-lg capitalize">Today's Schedule</p>
                <div class="flex justify-between">
                    <div>
                        <p class="h4 font-bold text-xs capitalize text-red-500">30 mins call with client</p>
                        <p class="h3 font-bold capitalize">Project Discovery Call</p>
                    </div>
                    <span class="text-blue-400 text-xs"> + Invite</span>
                </div>
                <div class="w-full p-3 bg-green-400 shadow-lg rounded-lg flex justify-between text-white">
                    <div class="flex -space-x-1 overflow-hidden my-auto">
                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                            src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                            src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
                            alt="">
                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                    </div>
                    <span>28:35</span>
                    <span>...</span>
                </div>
            </div>

            {{-- ------ --}}

            <div class="space-y-6">
                <div>
                    <p class="h2 font-bold text-lg capitalize">Design Project</p>
                    <p class="h4 font-bold text-xs capitalize text-gray-500">In progress</p>
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <div>
                        <span class="text-xs text-gray-500 font-bold capitalize">Connected</span>
                        <p class="text-2xl font-extrabold">
                            114
                        </p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 font-bold capitalize">In progress</span>
                        <p class="text-2xl font-extrabold">
                            114
                        </p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 font-bold capitalize">Team members</span>
                        <p class="text-2xl font-extrabold">
                            114
                        </p>
                    </div>
                </div>
            </div>
            {{-- ------ --}}

            <div class="space-y-6">
                <div>
                    <p class="h2 font-bold text-lg capitalize">New Task</p>
                    <p class="h4 font-bold text-xs capitalize text-gray-500">Task title</p>
                </div>

                <div class="relative">
                    <label class="sr-only" for="email"> Email </label>

                    <input class="w-full py-2 pl-3 text-sm border-1 border-gray-200 rounded-lg" id="email" type="email"
                        placeholder="Email" />

                    <button class="absolute p-2 text-white -translate-y-1/2 bg-blue-600 rounded-full top-1/2 right-2"
                        type="button">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </button>
                </div>
                <div class="flex gap-2">
                    <strong class="inline-flex items-center bg-gray-100 px-2 py-1.5 rounded-full">
                        <span class="text-xs truncate font-medium">
                            Simon Lewis
                        </span>

                        <img class="object-cover w-6 h-6 rounded-full ml-2.5 -mr-2.5"
                            src="https://www.hyperui.dev/photos/man-4.jpeg" alt="Simon Lewis">
                    </strong>

                    <strong class="inline-flex items-center bg-gray-100 px-2 py-1.5 rounded-full">
                        <img class="object-cover w-6 h-6 rounded-full -ml-2.5 mr-2.5"
                            src="https://www.hyperui.dev/photos/man-4.jpeg" alt="Simon Lewis">

                        <span class="text-xs truncate font-medium">
                            Simon Lewis
                        </span>
                    </strong>
                    <strong class="inline-flex items-center bg-gray-100 px-2 py-1.5 rounded-full">
                        <img class="object-cover w-6 h-6 rounded-full -ml-2.5 mr-2.5"
                            src="https://www.hyperui.dev/photos/man-4.jpeg" alt="Simon Lewis">

                        <span class="text-xs truncate font-medium">
                            Simon Lewis
                        </span>
                    </strong>
                </div>
            </div>
        </div>
        {{-- Container Two Ends --}}
    </div>
@endsection
