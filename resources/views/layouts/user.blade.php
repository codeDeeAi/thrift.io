<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="/svg/money-svgrepo-com.svg">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <script src="https://unpkg.com/vue@3"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        {{-- Page Layout --}}
        <div x-data="{ sidebar_open: false }" class="flex h-screen overflow-hidden bg-white rounded-lg">
            {{-- Sidebar --}}
            @include('components.navigation.sidebar.user')
            {{-- Sidebar Ends --}}
            <div class="flex flex-col flex-1 w-0 overflow-hidden">
                <main class="relative flex-1 overflow-y-auto focus:outline-none">
                    <div class="py-6">
                        <div class="px-4 mx-auto sm:px-6 md:px-8">
                            {{-- Header --}}
                            @include('components.navigation.header.user')
                            {{-- Header Ends --}}
                        </div>
                        <div class="px-4 mx-auto pt-4 sm:px-6 md:px-8 overflow-y-auto">
                            <!-- Content -->
                                @yield('content')
                            <!-- Content Ends-->
                        </div>
                    </div>
                </main>
            </div>
        </div>
        {{-- Page Layout Ends --}}
    </div>
</body>

</html>
