@extends('layouts.user')
@section('content')
    <div class="py-4 lg:flex gap-6 overflow-y-auto px-4">
        {{-- Container One --}}
        <div class="lg:w-4/6 h-full px-2 space-y-10">
            {{-- Cards --}}
            <div class="grid md:grid-cols-2 gap-6">
                @if (count($recent_groups) > 0)
                <a class="relative block p-8 bg-gradient-to-r from-red-400 to-orange-300 shadow-xl rounded-xl" href="">
                    <span
                        class="absolute right-4 top-4 rounded-full px-3 py-1.5 bg-green-100 text-green-600 font-medium text-xs">
                        4.3
                    </span>

                    <div class="mt-4 text-gray-500 sm:pr-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 sm:w-10 sm:h-10" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>
                        <h5 class="mt-4 text-xl font-bold text-gray-900">
                                {{ $recent_groups->first()->thrift_group->name }}
                        </h5>

                        <ul class="text-sm">
                            <li>{{ 'Total amount - ' . $recent_groups->first()->thrift_group->total_amount }}</li>
                            <li>{{ 'Max Members - ' . $recent_groups->first()->thrift_group->thrifters }}</li>
                            <li>{{ 'Amount per Member - ' . $recent_groups->first()->thrift_group->amount }}</li>
                            <li>{{ 'Schedule - ' . $recent_groups->first()->thrift_group->schedule }}</li>
                            <li>{{ 'Start Date - ' . $recent_groups->first()->thrift_group->start_date }}</li>
                        </ul>
                    </div>
                </a>
                @endif
                @if (count($recent_groups) > 1)
                    <a class="relative block p-8 bg-gradient-to-r from-purple-300 to-purple-400 shadow-xl rounded-xl"
                        href="">
                        <span
                            class="absolute right-4 top-4 rounded-full px-3 py-1.5 bg-green-100 text-green-600 font-medium text-xs">
                            4.3
                        </span>

                        <div class="mt-4 text-gray-500 sm:pr-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 sm:w-10 sm:h-10" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>

                            <h5 class="mt-4 text-xl font-bold text-gray-900">
                                {{ $recent_groups->last()->thrift_group->name }}
                            </h5>

                            <ul class="text-sm">
                                <li>{{ 'Total amount - ' . $recent_groups->last()->thrift_group->total_amount }}</li>
                                <li>{{ 'Max Members - ' . $recent_groups->last()->thrift_group->thrifters }}</li>
                                <li>{{ 'Amount per Member - ' . $recent_groups->last()->thrift_group->amount }}</li>
                                <li>{{ 'Schedule - ' . $recent_groups->last()->thrift_group->schedule }}</li>
                                <li>{{ 'Start Date - ' . $recent_groups->last()->thrift_group->start_date }}</li>
                            </ul>

                        </div>
                    </a>
                @endif
            </div>
            {{-- Cards Ends --}}

            {{-- Activities --}}
            <div class="">
                <p class="h2 font-bold text-lg capitalize pb-2 border-b border-gray-200">Recent Activities</p>
                {{-- <div class="flex justify-end gap-3">
                    <div class="overflow-hidden p-0.5 text-xs border rounded-full dark:border-gray-700">
                        <div class="sm:-mx-0.5 flex">
                            <button
                                class=" focus:outline-none px-3 w-1/2 sm:w-auto py-1 sm:mx-0.5 text-white bg-blue-500 rounded-full">Monthly</button>
                            <button
                                class=" focus:outline-none px-3 w-1/2 sm:w-auto py-1 sm:mx-0.5 text-gray-800 dark:text-gray-200 dark:hover:bg-gray-700 bg-transparent rounded-full hover:bg-gray-200">Yearly</button>
                        </div>
                    </div>
                </div> --}}
                {{-- Lists --}}
                <section class="mt-6">
                    <ul class="list-none space-y-6">
                        @foreach ($recent_activities as $activity)
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
                                            <p class="h3 font-bold text-sm capitalize">{{ $activity['created_at'] }}</p>
                                            @foreach ($activity['details'] as $detail)
                                                <p class="text-xs">{{ $detail }}
                                                </p>
                                            @endforeach
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
                        @endforeach
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
                        <span class="text-xs text-gray-500 font-bold capitalize">Created Groups</span>
                        <p class="text-2xl font-extrabold">
                            {{ $created_user_groups }}
                        </p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 font-bold capitalize">User Groups</span>
                        <p class="text-2xl font-extrabold">
                            {{ $user_groups }}
                        </p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 font-bold capitalize">Team members</span>
                        <p class="text-2xl font-extrabold">
                            {{ $team_members }}
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
