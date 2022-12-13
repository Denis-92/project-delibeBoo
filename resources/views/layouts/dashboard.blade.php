<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-info bg-info flex-md-nowrap p-3 header">
        <img src="{{ asset('images/logo_deliveboo.webp') }}" class="deliveboo_icon" alt="">
        <div class="d-flex flex-column"><a class="navbar-brand col-sm-3 col-md-2 mr-0 text-white"
                href="{{ route('login') }}">
                <h3>Deliveboo</h3>
            </a>
            <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-white" href="/">Vai al Sito</a>
        </div>
        <ul class="navbar-nav px-3 ml-auto">

            @auth

                <div class="bg-white d-flex align-items-center border rounded">
                    <li class="nav-item text-success py-0 pl-3 d-flex">
                        Autorizzato:
                        <p class="text-dark pl-1 pr-3 my-0"> {{ Auth::user()->name }}</p>
                    </li>

                </div>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li class="nav-item text-danger py-2 pr-3">
                    Non autorizzato
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">
                        Login
                    </a>
                    @csrf
                    </form>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @endauth

        </ul>
    </nav>

    <div class="">
        <div class="d-flex">
            <nav class="py-5" style="background-color: aliceblue; height:calc(100vh - 150px); width:16%">
                <div class="sidebar-sticky">
                    <ul class="nav d-flex flex-column">
                        <li class=" d-flex cardnav">
                            <div>
                                <img src="{{ asset('images/user_icon.png') }}" class="iconSideBar" alt="">
                            </div>
                            <div>
                                <a class="nav-link" href="{{ route('admin.users.index') }}">
                                    <h5>PROFILO</h5>
                                </a>
                            </div>

                        </li>
                        <li class=" d-flex cardnav">
                            <div>
                                <img src="{{ asset('images/resturants_icon.png') }}" class="iconSideBar"
                                    alt="">
                            </div>
                            <div>
                                <a class="nav-link" href="{{ route('admin.resturants.index') }}">
                                    <h5>RISTORANTI</h5>
                                </a>
                            </div>

                        </li>


                    </ul>
                </div>
            </nav>
            <main role="main" class="pt-5 d-flex flex-column align-items-center" style="width: 80%; margin: 0 auto">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>

<style>
    .header {
        height: 150px
    }

    .deliveboo_icon {
        width: 100px;
        height: 100px;
    }

    .iconSideBar {
        width: 70px;
        height: 70px
    }

    .cardnav {
        width: 100%;
        padding: 50px;
        align-items: center;
        justify-content: center;
    }

    .cardnav>img {
        width: 30%;
        display: flex;
        align-items: center
    }

    .cardnav>a {
        width: 70%;
        display: flex;
        align-items: center
    }

    #menudishes>ul {
        width: 100%;
        padding: 5px 10px
    }

    #menudishes>ul>li {
        list-style: none;
        margin: 5px 0;
        border: 2px solid rgb(180, 215, 246);
        text-align: center;
        cursor: pointer;
    }

    #menudishes>ul>li:hover {
        transform: scale(1.1)
    }
</style>
