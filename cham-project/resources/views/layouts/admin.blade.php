<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Chamily</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- jquuery -->
    <script src="/js/jquery-3.6.4.min.js"></script>
    <!-- bootstrap -->
     <link rel="stylesheet" href="/css/bootstrap.min.css">
    @yield('assets')
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a class="navbar-brand" href="{{ url('/admin') }}">
                        CHAMILY
            </a>
            <img src="/img_logo/Chamily_logo_color.png" alt="" width="50px" height="50px"/>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            @guest
            @else
                @if(Auth::user()->is_admin == 1)
                <li><a href="/admin" class="nav-link px-2">Home</a></li>
                <li><a href="/admin/event" class="nav-link px-2">Event</a></li>
                @endif
            @endguest
        </ul>

        <div class="col-md-3 text-end">
            @guest
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @else
            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu text-small" style="">
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
            @endguest
        </div>
        </header>
    </div>
    
    <div class="content-wrapper">
        <div class="card-body">
            <div class="container">
                @if (Session()->has('error'))
                    <div class="alert alert-danger">
                        {!! Session()->get('error') !!}
                    </div>
                    @if (Session()->has('message'))
                        <div class="alert alert-danger">
                            <ul class="mb-0 ml-2">
                                @foreach (Session()->get('message') as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endif
                @if (Session()->has('success'))
                    <div class="alert alert-success">
                        {{ Session()->get('success') }}
                    </div>
                @endif
            </div>
            @yield('content')

        </div>
    </div>

    <!-- bootstrap -->
    <script src="/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
