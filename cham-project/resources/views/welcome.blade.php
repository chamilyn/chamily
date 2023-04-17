@extends('layouts.client')
@section('assets')
    <link rel="stylesheet" href="frontend/style.css">
@endsection
@section('content')
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
@endsection