<!DOCTYPE html>
<html lang="en">
    <link rel="shortcut icon" href="img_logo/Chamily_logo_color.png"/>
    <head>
        <title>Chamily</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" href="/frontend/style_shw_neon_sign.css">
    </head>

    <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
        <div class="container">
            <a class="navbar-brand" href="/ledlight">
                <i class="fa fa-chevron-left" style="color: #FFF;"></i>
            </a>
        </div>
    </nav>

    <body>
        <div class="mt-4 mb-4">
            @if(isset($is_move) && $is_move == "move")
                <marquee class="{{isset($color) ? $color : ''}}" style="font-size: {{isset($size) ? $size : '9'}}rem !important;" scrollamount="20">{{isset($text) ? $text : '-'}}</marquee>
            @else
                <div class="text-center w-100 {{isset($color) ? $color : ''}}" style="font-size: {{isset($size) ? $size : '9'}}rem !important;white-space: nowrap;">
                    {{isset($text) ? $text : '-'}}
                </div>
            @endif
        </div>
    </body>
</html>