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

<body class="font-sans text-gray-900 antialiased dark:bg-white">
    <div class="min-h-screen grid grid-cols-[20%_60%_20%] bg-white">
        <nav
            class="max-h-screen grid grid-rows-4 place-items-center font-mono text-xl text-blue-700 sticky top-0 dark:bg-white w-full">
            <a href="/"
                class="group font-bold text-3xl flex items-center space-x-4 transition text-center">Accueil</a>
            <a href="{{ route('users') }}"
                class="group font-bold text-3xl flex items-center space-x-4 transition text-center">Membres</a>
            <a class="font-bold transition text-center text-3xl @if (Auth::check()) hidden @endif"
                href="/register">Inscription</a>
            <a class="font-bold transition text-center text-3xl @if (Auth::check()) hidden @endif"
                href="/login">Connexion</a>
            <a class="font-bold transition text-center text-3xl @if (!Auth::check()) hidden @endif"
                href="{{ route('profile.edit') }}">Profil</a>
            <form method="POST" action="{{ route('logout') }}" class="@if (!Auth::check()) hidden @endif">
                @csrf

                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Déconnexion') }}
                </x-dropdown-link>
            </form>
        </nav>

        <div class="m-4">
            {{ $slot }}
        </div>

        <div>
            <nav
                class="h-screen grid grid-rows-2 place-items-center font-mono text-xl text-blue-700 sticky top-0 dark:bg-white">
                <form method="GET" action='{{ route('accueil') }}'>
                    <input type="text" name="search" value="{{ request()->query('search') }}">
                    <input type="submit" value="Rechercher">
                </form>
                <div
                    class="rounded-full bg-blue-700 px-12 py-6 hover:bg-blue-900 @if (!Auth::check()) hidden @endif">
                    <a href="{{ route('tweets.add') }}" class="text-center text-white text-xl">Tweeter</a>
                </div>
            </nav>
        </div>
    </div>
</body>

</html>
