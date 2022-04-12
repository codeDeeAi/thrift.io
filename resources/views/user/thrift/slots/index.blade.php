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

        {{-- Content --}}
        <div id="slot_settings_page" class="py-4 grid md:grid-cols-2 gap-3">
            {{-- Members --}}
            <div class="shadow-sm rounded-lg p-3 overflow-auto border">
                <p class="font-bold h3 mb-1">Members</p>
                <div class="overflow-hidden overflow-x-auto border border-gray-100 rounded">
                    <table class="min-w-full text-sm divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Name</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Email</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Joined</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Badge</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Options</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            <tr v-for="(member, index) in members" :key="index">
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    @{{ member.user.name }}</td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">@{{ member.user.email }}</td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">@{{ member.created_at }}</td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    {{-- <strong v-if="member.thrift_group.user_id === member.user_id"
                                        class="border text-green-500 border-current uppercase px-2 py-1 rounded-full text-[10px] tracking-wide">
                                        Admin
                                    </strong>
                                    <strong v-else
                                        class="border text-blue-500 border-current uppercase px-2 py-1 rounded-full text-[10px] tracking-wide">
                                        Member
                                    </strong> --}}
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    <!-- Border - Right -->
                                    <button
                                        class="relative inline-flex cursor-grab items-center px-3 overflow-hidden text-green-600 border border-current rounded group active:text-green-500 focus:outline-none focus:ring"
                                        type="button" v-on:click="addToSlot(member)">
                                        <span
                                            class="absolute left-0 transition-transform -translate-x-full group-hover:translate-x-2">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </span>
                                        <span>...</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Members Ends --}}

            {{-- Slots --}}
            {{-- 'id', 'user_id', 'thrift_group_id', 'slot_date', 'position', 'status', 'is_movable', 'comment' --}}
            <div class="shadow-sm rounded-lg p-3 overflow-auto border">
                <p class="font-bold h3 mb-1">Slots</p>
                <div class="overflow-hidden overflow-x-auto border border-gray-100 rounded">
                    <table id="slots_table" class="min-w-full text-sm divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Position</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">User</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Date</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Status</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Comment</th>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Options</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            <tr v-for="(slot, index) in slots" :key="index">
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    @{{ index + 1 }}
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">

                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    @{{ slot.created_at }}
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    <button
                                        class="relative inline-flex cursor-grab items-center px-3 overflow-hidden text-red-600 border border-current rounded group active:text-red-500 focus:outline-none focus:ring"
                                        type="button" v-on:click="removeFromSlot(index)">
                                        <span>Delete</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Slots Ends --}}
        </div>
        {{-- Content Ends --}}
    </div>
    <input type="hidden" id="members_raw_data" value="{{ json_encode($members) }}">
    <input type="hidden" id="slots_raw_data" value="{{ json_encode($slots) }}">
    <input type="hidden" id="thrift_group_raw_data" value="{{ json_encode($thrift_group) }}">
    <script>
        Vue.createApp({
            data() {
                return {
                    message: 'Hello Vue!',
                    members: [],
                    slots: [],
                    max_slot_size: parseInt('{{ $thrift_group->thrifters }}'),
                    raw_slots: [],
                    trift_groups: [],
                }
            },
            methods: {
                // Load Initial Data
                loadData() {
                    this.members = JSON.parse(document.getElementById('members_raw_data').value);
                    this.raw_slots = JSON.parse(document.getElementById('slots_raw_data').value);
                    this.thrift_groups = JSON.parse(document.getElementById('thrift_group_raw_data').value);
                },

                // Add to slots
                addToSlot(member) {
                    if (this.slots.length >= this.max_slot_size) {
                        alert('Max slot size exceeded');
                        return;
                    };
                    this.slots.push(member);
                    this.slots.sort((a, b) => {
                        // Sort by id
                        return a.id - b.id
                    })
                },

                // Remove From Slots
                removeFromSlot(index) {
                    this.slots.splice(index, 1);
                    this.slots.sort((a, b) => {
                        // Sort by id
                        return a.id - b.id
                    })
                }
            },
            created() {
                this.loadData()
            },
        }).mount('#slot_settings_page')
    </script>
@endsection
