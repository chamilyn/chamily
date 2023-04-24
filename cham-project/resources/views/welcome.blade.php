@extends('layouts.client')
@section('assets')
    <link rel="stylesheet" href="frontend/style.css">
@endsection
@section('content')
<div class="" style="background-color: black;">
    <div class="firstsection">
        <div class="showcase">
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
        </div>
    </div>
</div>
<div class="secondsection">
        <div class="container d-flex justify-content-center">
            <div class="card" style="width: 90%;background-color: #000;">
                <div class="card-body" style="text-align: -webkit-center;">
                    <div class="container">
                        <h1 style="color:#FFFFFF;" class="text-center"><b>- Chamily Contact -</b></h1>
                    </div>

                    <div class="card" style="width: 15rem;"><!-- background-color: #FFF4BD; -->
                    <div class="mt-4">
                        <a href="https://line.me/ti/g2/gmYW9Z1ghA44ywx5PbSKXA"><img src="img_qr_chamily/QrCode.jpg" class="img-fluid rounded-start"></a>
                    </div>
                        <div class="card-body">
                            <h5 class="card-title">Click Me!</h5>
                            <div class="chamily_social">
                                <a href="#" class="fab fa-facebook"></a>
                                <a href="#" class="fab fa-twitter"></a>
                                <a href="#" class="fab fa-instagram"></a>
                                <a href="#" class="fab fa-tiktok"></a>
                                <a href="#" class="fab fa-google"></a>
                                <a href="#" class="fab fa-youtube"></a>
                            </div>
                        </div>
                    </div>
                    <blockquote class="twitter-tweet" data-conversation="none" align="center" data-link-color="#f00" lang="en">
                        <a href="https://twitter.com/Real_CSS_Tricks"></a><a href="http://t.co/19v3xxALrl"></a>”</p>&mdash; <a href="https://twitter.com/chamily_th/status/1618114443636019200?s=46&t=2WsLDusxwhOOZsqcfHj13Q"></a>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
@endsection