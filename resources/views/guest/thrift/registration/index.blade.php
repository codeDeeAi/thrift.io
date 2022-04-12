@extends('layouts.guest')
@section('content')
    {{-- $thrift_group = ThriftGroup::where('token', $token)->first('token', 'name', 'amount', 'is_open', 'schedule'); --}}
    <div class="flex justify-around p-4">
        <div
            class=" inline-block p-5 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-lg lg:p-16 sm:my-8 sm:align-middle sm:max-w-xl sm:w-full">
            <div>
                <div class="mt-3 text-left sm:mt-5">
                    <h2 class=" mb-8 text-xs font-semibold tracking-widest text-blue-500 uppercase">
                        Join Thrift Group </h2>
                    <h1 class=" mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600">
                        {{ $thrift_group->name }} </h1>
                    @if ($thrift_group->is_open)
                        <p class="mx-auto text-base leading-relaxed text-gray-500">
                            Join {{ $thrift_group->name }} thrift group with {{ $thrift_group->schedule }} payment of
                            {{ $thrift_group->amount }}
                        </p>
                        <p class="mx-auto text-base leading-relaxed text-gray-500 pt-3">
                            Click on <strong>Login</strong> if you are an existing user or click on <strong>New
                                User</strong> to create
                            new account and join group
                        </p>
                    @else
                        <p class="mx-auto text-base leading-relaxed text-gray-500">
                            {{ $thrift_group->name }} thrift group with {{ $thrift_group->schedule }} payment of
                            {{ $thrift_group->amount }} is currently not accepting new registrations. Pls contact group
                            owner
                            for more information
                        </p>
                    @endif

                </div>
            </div>
            <div class="mt-6 sm:flex">
                @if ($thrift_group->is_open)
                    <div class="mt-3 rounded-lg sm:mt-0">
                        <a href="{{ route('login', ['group_registration' => $thrift_group->token]) }}"
                            class=" items-center block px-10 py-3.5 text-base font-medium text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Login </a>
                    </div>

                    <div class="mt-3 rounded-lg sm:mt-0 sm:ml-3">
                        <a href="{{ route('register', ['group_registration' => $thrift_group->token]) }}"
                            class=" items-center block px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            New User </a>
                    </div>
                @else
                    <div class="mt-3 rounded-lg sm:mt-0">
                        <a href="/"
                            class=" items-center block px-10 py-3.5 text-base font-medium text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Go Home </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
