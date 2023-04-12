<!DOCTYPE html>
<html lang="en">
    <link rel="shortcut icon" href="/img_logo/Chamily_logo_color.png"/>
    <link rel="stylesheet" href="/frontend/stylemenubar.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <head>
    <title>Chamily</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>

    <body>
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3 bg-black">
        <div class="container">
            <a class="navbar-brand" href="#">CHAMILY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
              <div class="mx-auto"></div>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Schedule</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Wish</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Contact</a>
                </li>
              </ul>
            </div>
        </div>
      </nav>
      dsdsd
      <div class="content">
        Wait
      </div>


      <script src="/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript">
        var nav = document.querySelector('nav');

        window.addEventListener('scroll', function () {
            if (window.pageYOffset > 100) {
            nav.classList.add('bg-dark', 'shadow');
            } else {
            nav.classList.remove('bg-dark', 'shadow');
            }
        });
      </script>
    </body>
</html>