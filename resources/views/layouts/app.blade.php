<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="border fixed split-nav">
        <div class="nav-brand">
            <h3><a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></h3>
        </div>
        <div class="collapsible">
            <input id="collapsible1" type="checkbox" name="collapsible1">
            <button>
            <label for="collapsible1">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </label>
            </button>
            <div class="collapsible-body">
            <ul class="inline">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">@lang('Login')</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">@lang('Register')</a></li>
                    @endif
                @else
                    <li><a href="{{ route('home') }}">@lang('Profile')</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            @lang('Logout')
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    @yield('scripts')
</body>
</html>
