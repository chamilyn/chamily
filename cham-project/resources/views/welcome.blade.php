<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <header>
        <title>Chamily</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        <link rel="stylesheet" href="frontend/style.css">
        <h2 class="logo">Chamily</h2>
        <input type="checkbox" id="active">
        <label for="active" class="menu-btn"><span></span></label>
        <label for="active" class="close"></label>
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="#">Schedule</a></li>
                <li><a href="#">Game</a></li>
                <li><a href="#">Admin</a></li>
            </ul>
        </div>
    </header>
    <body>
        <div class="firstsection">
            <section class="showcase">
                <video autoplay="autoplay" loop="loop" muted defaultMuted playsinline  oncontextmenu="return false;"  preload="auto"  id="myVideo">
                    <source src="video/lalarak.mp4" type="video/mp4">
                </video>
                <div class="text">
                    <h2>Champoo</h2> 
                    <h3>Kodchaporn Leelatheep</h3>
                    <ul class="social">
                        <li><a href="https://www.facebook.com/cgm48official.champoo" target="_blank"><i class="fab fa-facebook-f"></i></a></li>        
                        <li><a href="https://www.instagram.com/champoo.cgm48official/?hl=th" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://www.tiktok.com/@champoocgm48.official?_t=8XVplZQcOx7&_r=1" target="_blank"><i class="fab fa-tiktok" width="10%"></i></a></li>
                    </ul>
                </div>
            </section>
        </div>
        <div class="secondsection">
            <section id="timeline">
                <div class="tl-item">
                    <div class="tl-bg" style="background-image: url(https://placeimg.com/801/801/nature)"></div>
                    <div class="tl-year">
                        <p class="f2 heading--sanSerif">2019</p>
                    </div>
                    <!-- <div class="tl-content">
                        <h1>Lorem ipsum dolor sit</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.</p>
                    </div> -->
                </div>

                <div class="tl-item">
                    <div class="tl-bg" style="background-image: url(https://placeimg.com/802/802/nature)"></div>
                    <div class="tl-year">
                        <p class="f2 heading--sanSerif">2020</p>
                    </div>
                    <!-- <div class="tl-content">
                        <h1 class="f3 text--accent ttu">Vestibulum laoreet lorem</h1>
                        <p>Suspendisse potenti. Sed sollicitudin eros lorem, eget accumsan risus dictum id. Maecenas dignissim ipsum vel mi rutrum egestas. Donec mauris nibh, facilisis ut hendrerit vel, fringilla sed felis. Morbi sed nisl et arcu.</p>
                    </div> -->
                </div>

                <div class="tl-item">
                    <div class="tl-bg" style="background-image: url(https://placeimg.com/803/803/nature)"></div>
                    <div class="tl-year">
                        <p class="f2 heading--sanSerif">2021</p>
                    </div>
                    <!-- <div class="tl-content">
                        <h1 class="f3 text--accent ttu">Phasellus mauris elit</h1>
                        <p>Mauris cursus magna at libero lobortis tempor. Suspendisse potenti. Aliquam interdum vulputate neque sit amet varius. Maecenas ac pulvinar nisi. Fusce vitae nunc ultrices, tristique dolor at, porttitor dolor. Etiam id cursus arcu, in dapibus nibh. Pellentesque non porta leo. Nulla eros odio, egestas quis efficitur vel, pretium sed.</p>
                    </div> -->
                </div>

                <div class="tl-item">
                    <div class="tl-bg" style="background-image: url(https://placeimg.com/800/800/nature)"></div>
                    <div class="tl-year">
                        <p class="f2 heading--sanSerif">2022</p>
                    </div>
                    <!-- <div class="tl-content">
                        <h1 class="f3 text--accent ttu">Mauris vitae nunc elem</h1>
                        <p>Suspendisse ac mi at dolor sodales faucibus. Nunc sagittis ornare purus non euismod. Donec vestibulum efficitur tortor, eget efficitur enim facilisis consequat. Vivamus laoreet laoreet elit. Ut ut varius metus, bibendum imperdiet ex. Curabitur diam quam, blandit at risus nec, pulvinar porttitor lorem. Pellentesque dolor elit.</p>
                    </div> -->
                </div>
            </section>
        </div>
        <div class="thirdsection">
            <div class="chamily_social">
                <h1>Chamily Contact!</h1><br>
                <a href="https://line.me/ti/g2/gmYW9Z1ghA44ywx5PbSKXA" target="_blank"><img src="img_qr_chamily/QrCode.jpg"/></a>
                <br>
                <a href="#" class="fab fa-facebook"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-tiktok"></a>
                <a href="#" class="fab fa-google"></a>
                <a href="#" class="fab fa-youtube"></a>
                <!-- <br>
                <img src="img_qr_chamily/kongtun.jpg"/> -->
                <center><hr></center>
                <blockquote class="twitter-tweet" data-conversation="none" align="center" data-link-color="#f00" lang="en">
                    <a href="https://twitter.com/Real_CSS_Tricks"></a><a href="http://t.co/19v3xxALrl"></a>�</p>&mdash; <a href="https://twitter.com/chamily_th/status/1618114443636019200?s=46&t=2WsLDusxwhOOZsqcfHj13Q"></a>
                </blockquote>
            </div>
        </div>
    </body>
</html>
