@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            color: #000;
            background-color: #eda4f0;
            transition: background-color 1s ease;
            text-align: center;
            font-size: 100%;
            line-height: 1.618;
        }

        /* panel styles */
        .panel {
            /* min height incase content is higher than window height */
            min-height: 100vh;
            display: flex;
            justify-content: space-around;
            font-family: sans-serif;
            /* outline: 10px solid hotpink; */
            /* turn above on to see the edge of panels */
        }

        /* colours */
        .color-violet {
            background-color: #7A4EAB;
        }

        .color-indigo {
            background-color: #4332CF;
        }

        .color-blue {
            background-color: #2F8FED;
        }

        .color-green {
            background-color: #4DCF42;
        }

        .color-yellow {
            background-color: #FAEB33;
        }

        .color-orange {
            background-color: #F19031;
        }

        .color-red {
            background-color: #F2293A;
        }

        h1,
        h2 {
            font-size: 3em;
            letter-spacing: -0.05em;
            line-height: 1.1;
        }

        p {
            max-width: 30em;
            margin-bottom: 1.618em;
        }

        a {
            color: #4332CF;
        }

        .mySlides {display:none;}
        .cafe_slides {display:none;}

        .button-55 {
            align-self: center;
            background-color: #fff;
            background-image: none;
            background-position: 0 90%;
            background-repeat: repeat no-repeat;
            background-size: 4px 3px;
            border-radius: 15px 225px 255px 15px 15px 255px 225px 15px;
            border-style: solid;
            border-width: 2px;
            box-shadow: rgba(0, 0, 0, .2) 15px 28px 25px -18px;
            box-sizing: border-box;
            color: #41403e;
            cursor: pointer;
            display: inline-block;
            font-family: Neucha, sans-serif;
            font-size: 1rem;
            line-height: 23px;
            outline: none;
            padding: .75rem;
            text-decoration: none;
            transition: all 235ms ease-in-out;
            border-bottom-left-radius: 15px 255px;
            border-bottom-right-radius: 225px 15px;
            border-top-left-radius: 255px 15px;
            border-top-right-radius: 15px 225px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
          }

          .button-55:hover {
            box-shadow: rgba(0, 0, 0, .3) 2px 8px 8px -5px;
            transform: translate3d(0, 2px, 0);
          }

          .button-55:focus {
            box-shadow: rgba(0, 0, 0, .3) 2px 8px 4px -6px;
          }

          .button {
  background-color: transparent;
  border-radius: 20px;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
}

.button4 {
  border: 2px solid #e7e7e7;
}
    </style>
@endsection
@section('content')
    <div class="panel" data-color="white">
        <div>
            <h1>Champoo Story</h1>
            <p>Scroll to animate the background colour of the body as a full height panel becomes visible.</p>
            <p>I have tried to comment the code, particurly the JavaScript, as much as possible. I hope it's clear to
                understand.</p>
            <p>If you have any questions my twitter is <a href="https://twitter.com/daveredfern">@daveredfern</a>.</p>
        </div>
    </div>
    <div class="panel" data-color="violet">
      <div>
        <h1>Image by fans</h1>
          <div class="text-center d-flex align-items-center justify-content-center">
              <img class="mySlides w3-animate-fading" src="/img_champooart/champybara.png" style="width: 40%;"></img>
              <img class="mySlides w3-animate-fading" src="/img_champooart/champoo_dead_sheep.png" style="width: 40%;"></img>
          </div>
      </div>
    </div>
    <div class="panel" data-color="indigo">
        <div>
            <h2>Cafe</h2><br>
            <div class="row" style="--bs-gutter-x: 0;">
                <div class="col-md-5">
                    <div class="w3-content w3-display-container" style="width: 90%;">
                        <div class="w3-display-container cafe_slides">
                            <img src="/img_birthday/Champoo-BD-23-AW_BKK.png" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides">
                            <img src="/img_birthday/bkk_cafe_1.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides">
                            <img src="/img_birthday/bkk_cafe_2.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides">
                            <img src="/img_birthday/bkk_cafe_3.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides">
                            <img src="/img_birthday/bkk_cafe_4.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides">
                            <img src="/img_birthday/bkk_cafe_5.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides">
                            <img src="/img_birthday/bkk_cafe_6.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides">
                            <img src="/img_birthday/bkk_cafe_7.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides">
                            <img src="/img_birthday/bkk_cafe_8.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides">
                            <img src="/img_birthday/bkk_cafe_9.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides">
                            <img src="/img_birthday/bkk_cafe_10.jpg" style="width:100%">
                        </div>
                        <button style="top: 40% !important;" class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
                        <button style="top: 40% !important;" class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
                        <br>
                        <button style="" class="button button4"><font color="white"><b>BKK</b></font></button>
                    </div>
                </div>
                <div class="col-md-1">
                    <br>
                </div>
                <div class="col-md-1">
                    <br>
                </div>
                <div class="col-md-5">
                    <div class="w3-content w3-display-container" style="width: 90%;">
                        <div class="w3-display-container cafe_slides_cnx">
                            <img src="/img_birthday/Champoo-BD-23-AW_CNX.png" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides_cnx">
                            <img src="/img_birthday/cnx_cafe_1.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides_cnx">
                            <img src="/img_birthday/cnx_cafe_2.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides_cnx">
                            <img src="/img_birthday/cnx_cafe_3.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides_cnx">
                            <img src="/img_birthday/cnx_cafe_4.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides_cnx">
                            <img src="/img_birthday/cnx_cafe_5.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides_cnx">
                            <img src="/img_birthday/cnx_cafe_6.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides_cnx">
                            <img src="/img_birthday/cnx_cafe_7.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides_cnx">
                            <img src="/img_birthday/cnx_cafe_8.jpg" style="width:100%">
                        </div>
                        <div class="w3-display-container cafe_slides_cnx">
                            <img src="/img_birthday/cnx_cafe_9.jpg" style="width:100%">
                        </div>
                        <button style="top: 40% !important;" class="w3-button w3-display-left w3-black" onclick="plusDivsCnx(-1)">&#10094;</button>
                        <button style="top: 40% !important;" class="w3-button w3-display-right w3-black" onclick="plusDivsCnx(1)">&#10095;</button>
                        <br>
                        <button style="" class="button button4"><font color="white"><b>CNX</b></font></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="panel" data-color="blue">
        <div style="width: 90%;">
            <h2>MBK</h2><br>
        
            <iframe width="100%" height="65%" src="https://www.youtube.com/embed/m6svJS9JtD0"></iframe>
        </div>
    </div>
    <div class="panel" data-color="green">
        <h2>Green panel</h2>
    </div>
    <div class="panel" data-color="yellow">
        <h2>Yellow panel</h2>
    </div>
    <div class="panel" data-color="orange">
        <h2>Orange panel</h2>
    </div>
    <div class="panel" data-color="red">
        <h2>Red panel</h2>
    </div>
@endsection
@section('scripts')
    <script>
        var slideIndexCafe = 1;
        showDivs(slideIndexCafe);

        function plusDivs(n) {
            showDivs(slideIndexCafe += n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("cafe_slides");
            if (n > x.length) {slideIndexCafe = 1}
            if (n < 1) {slideIndexCafe = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            x[slideIndexCafe-1].style.display = "block";  
        }

        var slideIndexCafeCnx = 1;
        showDivsCnx(slideIndexCafeCnx);

        function plusDivsCnx(n) {
            showDivsCnx(slideIndexCafeCnx += n);
        }

        function showDivsCnx(n) {
            var i;
            var x = document.getElementsByClassName("cafe_slides_cnx");
            if (n > x.length) {slideIndexCafeCnx = 1}
            if (n < 1) {slideIndexCafeCnx = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            x[slideIndexCafeCnx-1].style.display = "block";  
        }

        var myIndex = 0;
        carousel();

        function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 5000);    
        }
        $(window).scroll(function() {

            // selectors
            var $window = $(window),
                $body = $('body'),
                $panel = $('.panel');

            // Change 33% earlier than scroll position so colour is there when you arrive.
            var scroll = $window.scrollTop() + ($window.height() / 3);

            $panel.each(function() {
                var $this = $(this);

                // if position is within range of this panel.
                // So position of (position of top of div <= scroll position) && (position of bottom of div > scroll position).
                // Remember we set the scroll to 33% earlier in scroll var.
                if ($this.position().top <= scroll && $this.position().top + $this.height() > scroll) {

                    // Remove all classes on body with color-
                    $body.removeClass(function(index, css) {
                        return (css.match(/(^|\s)color-\S+/g) || []).join(' ');
                    });

                    // Add class of currently active div
                    $body.addClass('color-' + $(this).data('color'));
                }
            });

        }).scroll();
    </script>
@endsection