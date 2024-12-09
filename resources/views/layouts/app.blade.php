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
            <div class="bg-gray-800 text-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center py-4">
                        <div>
                            <a href="{{ route('dashboard') }}" class="text-lg font-semibold hover:text-yellow-500">Dashboard</a>
                        </div>
                        <nav class="space-x-4 flex items-center">
                            <a href="{{ route('organizations.index') }}" class="hover:text-yellow-500">Organizations</a>
                            <a href="{{ route('events.index') }}" class="hover:text-yellow-500">Events</a>
                            <a href="{{ route('posts.index') }}" class="hover:text-yellow-500">Posts</a>

                            <!-- Logout Link -->
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" 
                                        class="text-white hover:text-yellow-500">
                                    Logout
                                </button>
                            </form>
                        </nav>
                    </div>
                </div>
            </div>

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
