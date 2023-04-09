<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>	
        <title>Chamily</title>	
        <link rel="shortcut icon" href="../img_logo/Chamily_logo_white.png"/>	
        <meta name="viewport" content="width=device-width, initial-scale=1.0">	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>	
        <link rel="stylesheet" href="../frontend/styleflowers.css">	
    </head>	
    <body>
    <!-- logo&name -->	
    <div style="padding: 30px;">	
        <div class="textheader">	
            Chamily	
        </div>	
        <div class="logo">	
            <img src="/img_logo/Chamily_logo_color.png" width="50px" height="50px"/>	
        </div>	
    </div>	
    <!-- ========= -->	
    <div class="card-container" style="background-color: {{$background_color}};">	
        <span class="pro">{{$short_month}}</span>	
        <img class="round" src="/flowers/{{$img_path}}" width="200px" height="200px" style="border: 1px solid {{$img_color}};"/>	
        <h3>-{{$flower_text}}-</h3>	
        <!-- ================================================================ -->	
        <p>&emsp;&emsp;{{$message}}</p>	
        <!-- ================================================================ -->	
        <div class="contact">	
            <h6>Contact</h6>	
            <ul class="social-icons">	
                <li><a href="https://www.facebook.com/cgm48official.champoo"><i class="fab fa-facebook-f"></i></a></li>            	
                <li><a href="https://www.instagram.com/champoo.cgm48official/?hl=th"><i class="fab fa-instagram"></i></a></li>	
                <li><a href="https://www.tiktok.com/@champoocgm48.official?_t=8XVplZQcOx7&_r=1"><i class="fab fa-tiktok"></i></a></li>	
            </ul>	
        </div>	
    </div>
    </body>
</html>
