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
                <div class="flex justify-between">
                    <p class="font-bold h3 mb-1">Slots</p>
                    <div class="flex gap-2">
                        <button v-if="slots.length > 1"
                            v-on:click="is_swap_active = !is_swap_active; slot_position_swap = [];"
                            class="px-2 py-1 mb-2 font-sm text-xs tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500">
                            @{{ (!is_swap_active) ? 'Start Swap' : 'End Swap' }}
                        </button>
                        <button v-if="slot_position_swap.length == 2" v-on:click="swapSlotPosition()"
                            class="px-2 py-1 mb-2 font-sm text-xs tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-600 rounded-md hover:bg-green-500">
                            Swap
                        </button>
                        <button v-if="slots.length == max_slot_size" v-on:click="saveSlotForm()"
                            class="px-2 py-1 mb-2 font-sm text-xs tracking-wide text-white capitalize transition-colors duration-200 transform bg-purple-600 rounded-md hover:bg-purple-500">
                            Save Slots
                        </button>
                    </div>
                </div>
                <div class="overflow-hidden overflow-x-auto border border-gray-100 rounded">
                    <table id="slots_table" class="min-w-full text-sm divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50">
                                <th v-if="is_swap_active"
                                    class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap"></th>
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
                                <td v-if="is_swap_active" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    <div v-if="slot.slot.is_movable" class="flex items-center">
                                        <button v-if="slot.slot.status == '{{ App\Enums\ThriftSlotStatus::UNPAID }}'"
                                            class="p-2 text-blue-600 rounded " v-on:click="addOrRemovePositionSwap(index)"
                                            v-bind:class="{'bg-blue-500' : slot_position_swap.includes(index), 'bg-gray-200': !slot_position_swap.includes(index) }">
                                        </button>
                                    </div>
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    @{{ index + 1 }}
                                </td>
                                <td class="flex-col px-4 py-2 text-gray-700 whitespace-nowrap">
                                    <p>@{{ slot?.member?.user?.name }}</p>
                                    <p>@{{ slot?.member?.user?.email }}</p>
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    @{{ slot?.slot?.created_at }}
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    @{{ slot?.slot?.status }}
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    comment
                                </td>
                                <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                    <div v-if="slot.slot.is_movable">
                                        <button v-if="slot.slot.status == '{{ App\Enums\ThriftSlotStatus::UNPAID }}'"
                                            class="relative inline-flex cursor-grab items-center px-3 overflow-hidden text-red-600 border border-current rounded group active:text-red-500 focus:outline-none focus:ring"
                                            type="button" v-on:click="removeFromSlot(index)">
                                            <span>Delete</span>
                                        </button>
                                    </div>
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

    {{-- Form For Slots --}}
    <form id="final_slot_form" action="{{ route('user.thrift.slots', ['token' => $thrift_group->token]) }}" method="POST">
        @csrf
        <input type="hidden" name="slots_data" id="slots_data">
    </form>
    {{-- Form For Slots End --}}

    <input type="hidden" id="members_raw_data" value="{{ json_encode($members) }}">
    <input type="hidden" id="slots_raw_data" value="{{ json_encode($slots) }}">
    <input type="hidden" id="thrift_group_raw_data" value="{{ json_encode($thrift_group) }}">
    <script>
        Vue.createApp({
            data() {
                return {
                    message: 'Hello Vue!',
                    members: [],
                    slot_position_swap: [],
                    slots: [],
                    is_swap_active: false,
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

                // Save Slot Form
                saveSlotForm() {
                    if (this.slots.length < this.max_slot_size) {
                        alert(`Slots must be equal to ${this.max_slot_size}`)
                        return;
                    }

                    // Clone slots
                    let final_slots = JSON.parse(JSON.stringify(this.slots));

                    // Perform transform and checks on final_slot

                    // Attach final slot to slot form and submit
                    let form_data = document.getElementById('slots_data');
                    form_data.value = JSON.stringify(final_slots);

                    document.getElementById('final_slot_form').submit(); // Submit form

                },

                // Sort Saved slots
                sortSavedSlots() {
                    /***/
                    // trift_groups.slot_positions
                },

                // Add to slots
                addToSlot(member) {
                    if (this.slots.length >= this.max_slot_size) {
                        alert('Max slot size exceeded');
                        return;
                    };
                    let slot_template = {
                        user_id: member.id,
                        member: member,
                        slot: {
                            is_movable: true,
                            status: '{{ App\Enums\ThriftSlotStatus::UNPAID }}',
                        }
                    }
                    this.slots.push(slot_template);
                    // this.slots.sort((a, b) => {
                    //     // Sort by position
                    //     return a.position - b.position
                    // })
                },

                // Remove From Slots
                removeFromSlot(index) {
                    this.slots.splice(index, 1);
                    // this.slots.sort((a, b) => {
                    //     // Sort by position
                    //     return a.position - b.position
                    // })
                },

                // Add slot to position swap
                addOrRemovePositionSwap(slot_index) {
                    if (this.slot_position_swap.includes(slot_index)) {
                        for (let index = 0; index < this.slot_position_swap.length; index++) {
                            const element = this.slot_position_swap[index];
                            if (element == slot_index) {
                                this.slot_position_swap.splice(index, 1)
                            }
                        }
                        return;
                    }
                    if (this.slot_position_swap.length >= 2) {
                        alert('Cannot swap more than two positions at a time')
                        return;
                    }

                    if (!this.slots[slot_index].slot.is_movable) {
                        alert('This item is fixed and cannot be swapped')
                        return;
                    }

                    this.slot_position_swap.push(slot_index);
                },

                // Swap Position
                swapSlotPosition() {
                    let from_item_index = null;
                    let to_item_index = null;

                    for (let index = 0; index < this.slots.length; index++) {
                        if (index == this.slot_position_swap[0]) {
                            from_item_index = index;
                        }
                        if (index == this.slot_position_swap[1]) {
                            to_item_index = index
                        }
                    }
                    // replace items
                    let from_item = JSON.parse(JSON.stringify(this.slots[from_item_index]))
                    let to_item = JSON.parse(JSON.stringify(this.slots[to_item_index]))

                    this.slots[from_item_index] = to_item;
                    this.slots[to_item_index] = from_item;

                    this.slot_position_swap = [];
                }
            },
            created() {
                this.loadData()
            },
        }).mount('#slot_settings_page')
    </script>
@endsection
