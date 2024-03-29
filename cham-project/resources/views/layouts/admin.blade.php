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
    <link href="/css/styles.css" rel="stylesheet" />
     <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
     
    @yield('assets')
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
        <!-- Navbar Brand-->
        <img src="/img_logo/Chamily_logo_color.png" alt="" width="50px" height="50px"/>
        <a class="navbar-brand ps-3" href="/admin">CHAMILY</a>
        @auth
        @if(Auth::user()->is_admin == 1)
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        @endif
        @endauth
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
            </div>
        </form>
        
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @guest
                        <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        @auth
        @if(Auth::user()->is_admin == 1)
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="/admin/event">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Events
                        </a>
                        <a class="nav-link" href="/admin/feedbacks">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Feedbacks
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Kongtun
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/admin/savings/1">General Election 4</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/kongtun/summary">Summary (ตัวเอง)</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    @auth
                        {{ Auth::user()->name }}
                    @endauth
                </div>
            </nav>
        </div>
        @endif
        @endauth
        <div id="layoutSidenav_content">
            <main>
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
                @yield('content')
            </main>
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts.js"></script>
    @yield('scripts')
</body>
</html>
