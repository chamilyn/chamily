@extends('layouts.client')
@section('assets')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            color: #000;
            background-color: #f4f4f4;
            transition: background-color 1s ease;
        }

        /* panel styles */
        .panel {
            /* min height incase content is higher than window height */
            min-height: 100vh;
            display: flex;
            justify-content: space-around;
            align-items: center;
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

        /* styling for demo, can ignore */
        body {
            text-align: center;
            font-size: 120%;
            line-height: 1.618;
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
    </style>
@endsection
@section('content')
    <div class="panel" data-color="white">
        <div>
            <h1>Magic scrolling colours</h1>
            <p>Scroll to animate the background colour of the body as a full height panel becomes visible.</p>
            <p>I have tried to comment the code, particurly the JavaScript, as much as possible. I hope it's clear to
                understand.</p>
            <p>If you have any questions my twitter is <a href="https://twitter.com/daveredfern">@daveredfern</a>.</p>
        </div>
    </div>
    <div class="panel" data-color="violet">
      <div>
        <h1>Image by fans</h1>
          <div class="text-center">
              <img class="mySlides w3-animate-fading" src="/img_champooart/champybara.png" style="max-width: 50%;"></img>
              <img class="mySlides w3-animate-fading" src="/img_champooart/champoo_dead_sheep.png" style="max-width: 50%;"></img>
          </div>
      </div>
    </div>
    <div class="panel" data-color="indigo">
        <h2>Indigo panel</h2>
    </div>
    <div class="panel" data-color="blue">
        <h2>Blue panel</h2>
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
