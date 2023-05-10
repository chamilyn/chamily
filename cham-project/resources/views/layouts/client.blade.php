<!DOCTYPE html>
<html lang="en">
    <link rel="shortcut icon" href="/img_logo/Chamily_logo_color.png"/>
    <head>
        <title>Chamily</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        content="https://chamily.net/img_logo/chamily.jpg"
        />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Chamily - Champoo CGM48" />
        <meta
        property="twitter:description"
        content="สวัสดีดีดี ยินดีต้อนรับสู่เว็บไซต์ Chamily เหล่าไดโนของแชมพู 🌻🦖☀️"
        />
        <meta
        property="twitter:image"
        content="https://chamily.net/img_logo/chamily.jpg"
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
        <nav class="navbar sticky-top bg-dark navbar-dark"><!-- navbar-expand-lg -->
            <div class="container-fluid">
                <div class="col-md-3 mb-2 mb-md-0">
                    <img src="img_logo/Chamily_logo_color.png" alt="" width="40px" height="40px"/>                
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
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule">Champoo Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/feedbacks">Feedback</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Wish</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li> -->
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