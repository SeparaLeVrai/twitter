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

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center p-6 sm:pt-0 bg-gray-100">
        <nav
            class="m-4 grid 2xl:grid-cols-4 place-items-center p-5 shadow-lg shadow-slate-700 rounded-xl dark:bg-white w-full">
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

        <div>
            {{ $slot }}
        </div>
    </div>
</body>

</html>
