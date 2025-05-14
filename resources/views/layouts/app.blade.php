<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Navigation -->
    <nav class="bg-black text-white border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Home & Account -->
                <div class="flex items-center space-x-6">
                    <a href="{{ route('sports.index') }}"
                       class="{{ request()->routeIs('sports.index') ? 'text-red-500 border-b-2 border-red-500' : 'hover:border-b-2 hover:border-red-500' }} text-lg font-semibold pb-1 transition">
                        Home
                    </a>

                    <a href="{{ route('account.show') }}"
                       class="{{ request()->routeIs('account.show') ? 'text-red-500 border-b-2 border-red-500' : 'hover:border-b-2 hover:border-red-500' }} text-lg font-semibold pb-1 transition">
                        Account
                    </a>
                </div>

                <!-- Center: Logo -->
                <div class="text-red-500 text-xl font-bold">
                    Sport-overview
                </div>

                
                <div class="flex items-center space-x-6">
                    <!-- Sport Categories -->
                    <nav class="space-x-4 text-sm font-medium">
                        <a href="{{ route('sports.show', 'mma') }}"
                           class="{{ request()->is('sports/mma*') ? 'text-red-500 border-b-2 border-red-500' : 'hover:border-b-2 hover:border-red-500' }} pb-1 transition">
                            MMA
                        </a>

                        <a href="{{ route('sports.show', 'basketball') }}"
                           class="{{ request()->is('sports/basketball*') ? 'text-red-500 border-b-2 border-red-500' : 'hover:border-b-2 hover:border-red-500' }} pb-1 transition">
                            Basketball
                        </a>

                        <a href="{{ route('sports.show', 'boxing') }}"
                           class="{{ request()->is('sports/boxing*') ? 'text-red-500 border-b-2 border-red-500' : 'hover:border-b-2 hover:border-red-500' }} pb-1 transition">
                            Boxing
                        </a>

                        <a href="{{ route('sports.show', 'football') }}"
                           class="{{ request()->is('sports/football*') ? 'text-red-500 border-b-2 border-red-500' : 'hover:border-b-2 hover:border-red-500' }} pb-1 transition">
                            Football
                        </a>

                        @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('events.index') }}"
                               class="{{ request()->routeIs('events.*') ? 'text-red-500 border-b-2 border-red-500' : 'hover:border-b-2 hover:border-red-500' }} pb-1 transition">
                                Events
                            </a>
                        @endif
                        @endauth
                    </nav>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="text-white hover:border-b-2 hover:border-red-500 pb-1 transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>
