<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark shadow-lg" style="background-color: black">
        <div class="container fs-5">
            <a class="navbar-brand fs-3" href="{{route('clothes.index')}}">
                Clothes.com
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    @if(isset($categories))
                        @foreach($categories as $cat)
                            <a class="nav-link" aria-current="page"
                               href="{{route('clothes.category', $cat->id)}}">{{$cat->name}}</a>
                        @endforeach
                    @endif
                </ul>


                <ul class="navbar-nav ms-auto">

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif

                    @else
                        @if(Auth::user()->role->name == 'admin')
                            {{--<form action="{{route('clothes.search')}}" method="GET">
                                <div class="input-group mb-3">

                                    <input type="text" name="search" class="form-control" placeholder="Search"style="width: 300px" aria-label="Clothetype" aria-describedby="basic-addon1" >
                                    <button class="btn btn-success" type="submit" >Search</button>
                                </div>

                            </form>--}}
                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('adm.users.index') }}">Admin page</a>
                            </li>
                        @elseif(Auth::user()->role->name == 'moderator')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adm.categories.index') }}">Moderator page</a>
                        </li>
                        @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    {{ Auth::user()->name }}
                                </a>



                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="{{route('cart.index')}}">CARD</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @if (session('message'))
        <div class="container mt-5">
            <div class="col-9 mx-auto">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <main class="mt-5">
        @yield('content')
    </main>
</div>
</body>
</html>
