<!DOCTYPE html>
<html lang="en">
    <link rel="shortcut icon" href="/img_logo/Chamily_logo_color.png"/>
    <head>
        <title>Chamily</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- OG -->
        <meta name="og:title" content="Chamily - Champoo CGM48" />
        <meta
        name="description"
        content="สวัสดีดีดี ยินดีต้อนรับสู่เว็บไซต์ Chamily เหล่าไดโนของแชมพู 🌻🦖☀️"
        />
        <meta
        property="og:description"
        content="สวัสดีดีดี ยินดีต้อนรับสู่เว็บไซต์ Chamily เหล่าไดโนของแชมพู 🌻🦖☀️"
        />
        <meta
        property="og:image"
        content="https://chamily.net/img_background/CHAMILY-2.jpg"
        />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Chamily - Champoo CGM48" />
        <meta
        property="twitter:description"
        content="สวัสดีดีดี ยินดีต้อนรับสู่เว็บไซต์ Chamily เหล่าไดโนของแชมพู 🌻🦖☀️"
        />
        <meta
        property="twitter:image"
        content="https://chamily.net/img_background/CHAMILY-2.jpg"
        />
        <!-- jquuery -->
        <script src="/js/jquery-3.6.4.min.js"></script>
        <!-- bootstrap -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-S33FV423R4"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-S33FV423R4');
        </script>
        @yield('assets')
    </head>
    <body>
        <!--nav class="navbar sticky-top bg-dark navbar-dark">
            <div class="container-fluid">
                <div class="col-md-3 mb-2 mb-md-0">
                    <img src="/img_logo/Chamily_logo_color.png" alt="" width="40px" height="40px"/>                
                    <a class="navbar-brand" href="/" style="vertical-align: middle;">
                                CHAMILY
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/random">Random Number</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/feedbacks">Feedback</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav-->

        <nav class="navbar sticky-top navbar-light bg-light">
            <div class="container-fluid">
                <div class="col-md-3 mb-2 mb-md-0">
                    <img src="/img_logo/Chamily_logo_color.png" alt="" width="40px" height="40px"/>                
                    <a class="navbar-brand" href="/" style="vertical-align: middle;">
                                CHAMILY
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <!--li class="nav-item">
                        <a class="nav-link" href="/wish">Wish</a>
                    </li-->
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/random">Random</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ledlight">Led Light</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/games/quiz">Chamily Quiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/record_iam">ดาวน์โหลดปกไลฟ์จาก iam48</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/feedbacks">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kongtun">Kongtun Rules</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/kongtun/login">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/kongtun/summary">Kongtun Summary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                    
                </ul>
                </div>
            </div>
        </nav>

        <div>
            @yield('content')
        </div>
        <!-- bootstrap -->
        <script src="/js/bootstrap.bundle.min.js"></script>
        @yield('scripts')
    </body>
</html>