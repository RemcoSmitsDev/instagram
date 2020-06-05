<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Remco Smits instagram remake</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body class="bg-gray-200">
        <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .instagram-border {
            background: -moz-linear-gradient(left, rgba(254, 218, 117, 1) 0%, rgba(250, 126, 30, 1) 17%, rgba(214, 41, 118, 1) 41%, rgba(150, 47, 191, 1) 71%, rgba(79, 91, 213, 1) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(254, 218, 117, 1)), color-stop(17%, rgba(250, 126, 30, 1)), color-stop(41%, rgba(214, 41, 118, 1)), color-stop(71%, rgba(150, 47, 191, 1)), color-stop(100%, rgba(79, 91, 213, 1)));
            background: -webkit-linear-gradient(left, rgba(254, 218, 117, 1) 0%, rgba(250, 126, 30, 1) 17%, rgba(214, 41, 118, 1) 41%, rgba(150, 47, 191, 1) 71%, rgba(79, 91, 213, 1) 100%);
            background: -o-linear-gradient(left, rgba(254, 218, 117, 1) 0%, rgba(250, 126, 30, 1) 17%, rgba(214, 41, 118, 1) 41%, rgba(150, 47, 191, 1) 71%, rgba(79, 91, 213, 1) 100%);
            background: -ms-linear-gradient(left, rgba(254, 218, 117, 1) 0%, rgba(250, 126, 30, 1) 17%, rgba(214, 41, 118, 1) 41%, rgba(150, 47, 191, 1) 71%, rgba(79, 91, 213, 1) 100%);
        }

        </style>
        <div class="fixed z-10 inset-x-0 top-0 bg-white shadow">
            <div class="pl-4 pr-2 container max-w-7xl mx-auto">
                <div class="flex w-full h-12 md:h-auto justify-center md:justify-between items-center">
                    <a class="flex items-center justify-center md:justify-start navbar-brand" href="{{ url('/') }}">
                        <span class="py-2 mt-px">
                            <img src="https://www.instagram.com/static/images/web/mobile_nav_type_logo.png/735145cfe0a4.png"
                                alt="instagram remake remco smits">
                        </span>
                    </a>
                    <nav class="hidden md:block">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                @if(!Request::is('login', 'register'))
                                <div class="flex items-center space-x-4">
                                    <a class="" href="/login">
                                        Inloggen
                                    </a>
                                    <a class="" href="/register">
                                        Registreren
                                    </a>
                                </div>
                                @endif
                                @else
                                <li class="dropdown inline-block">
                                    <a class="inline-flex items-center" href="/profile/{{ Auth::user()->id }}"
                                        class="text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
                                        <img class="mr-2 h-8 w-8 md:w-6 md:h-6 rounded-full"
                                            src="{{ Auth::user()->profile->profileImage() }}" alt="">
                                        <span class="mr-1">{{ Auth::user()->username }}</span>
                                        <svg class="fill-current -mb-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu block rounded border-t border-transparent overflow-y-hidden absolute hidden text-gray-700"
                                        aria-labelledby="navbarDropdown">
                                        <div class="mr-10 mt-2 w-full bg-white shadow">
                                            <span class="">

                                                <a class="hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                                    href="/profile/{{ Auth::user()->id }}">
                                                    Mijn posts
                                                </a>
                                            </span>
                                            <a class="hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                                href="/p/create">
                                                add post
                                            </a>
                                            <a class="hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                                href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                        </div>

                    </nav>
                </div>
            </div>
        </div>
        <main id="app">
            <div class="h-full w-full ">
                @yield('content')
            </div>

        </main>
        @guest
        @if(!Request::is('login','register'))

        <div
            class="border-t shadow-lg py-4 px-16 min-w-screen bg-white flex justify-between md:hidden fixed bottom-0 inset-x-0 flex text-gray-600">
            <a class="" href="/login">
                Inloggen
            </a>
            <a class="" href="/register">
                Registreren
            </a>
        </div>
        @endif
        @else
        <div
            class="border-t shadow-lg py-4 px-4 min-w-screen bg-white flex justify-between md:hidden fixed bottom-0 inset-x-0 flex text-gray-600">
            <a class="" href="/">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                    </path>
                </svg>
            </a>
            <a class="" href="/zoeken">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </a>
            <a class="block" href="/p/create">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </a>

            <a class="block" href="/profile/{{ Auth::user()->id }}">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"
                        fill-rule="evenodd"></path>
                </svg>
            </a>
            <a class="block" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        @endif
    </body>

</html>
