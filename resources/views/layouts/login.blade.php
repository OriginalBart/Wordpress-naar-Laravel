<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'login') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<div id="app">
    <!-- HEADER -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a class="header__logo" href="{{ url('/') }}">
                        {{ config('app.name', 'app') }}
                    </a>

                    <nav class="header__navigation">

                        <ul class="navigation">
                            @guest
                                @if (Route::has('login'))
                                    <li class="navigation__li">
                                        <a class="navigation__link " href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="navigation__li">
                                        <a class="navigation__link "
                                           href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="navigation__li">
                                    <a class="navigation__link " href="#" role="button" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER -->

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>

</html>
