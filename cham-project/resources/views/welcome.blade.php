@extends('layouts.client')
@section('assets')
    <link rel="stylesheet" href="frontend/style.css?v={{ time() }}">
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
@endsection
@section('content')
<div class="" style="background-color: #EFEFEF;">
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
            <div class="card" style="width: 90%;background-color: #EFEFEF;border: 0px;">
                <div class="card-body" style="text-align: -webkit-center;border: 0px;">
                    <br>
                    <div class="container">
                        <h2 style="color:black;" class="text-center"><b>Chamily Contact</b></h2>
                    </div>
                    <br>
                    <div class="card" style="width: 15rem;"><!-- background-color: #FFF4BD; -->
                    <div class="mt-4">
                        <a href="https://line.me/ti/g2/gmYW9Z1ghA44ywx5PbSKXA"><img src="img_qr_chamily/QrCode.jpg" class="img-fluid rounded-start"></a>
                    </div>
                        <div class="card-body">
                            <h5 class="card-title">Click Me!</h5>
                            <div class="chamily_social">
                                <a href="https://www.facebook.com/ChamilyTH" class="fab fa-facebook media_btn"></a>
                                <a href="https://twitter.com/Chamily_TH?s=20" class="fab fa-twitter media_btn"></a>
                                <a href="https://instagram.com/chamily_th?igshid=YmMyMTA2M2Y=" class="fab fa-instagram media_btn"></a>
                                <a href="https://www.tiktok.com/@chamily_th?_t=8bntwvY6JWb&_r=1" class="fab fa-tiktok media_btn"></a>
                                <a href="mailto: chamilyth@gmail.com" class="fab fa-google media_btn"></a>
                                <a href="https://www.youtube.com/channel/UCr-e1cO5ShlsIzzn7AWLV8g" class="fab fa-youtube media_btn"></a>
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
<!--
  <!DOCTYPE html>
<html>
<head>
  <style>
    body{
  background-color: #222;
  line-height: 7px;
}

#wrapper{
  width: 420px;
  margin: 50px auto;
}

#theMarquee{
  height: 55px;
  background: linear-gradient(0deg, #111, #222);
  box-shadow: 
    0px 0px 2px 0px #aaa inset,
    0px -1px 2px 0px #aaa inset,
    2px -5px 5px 0px #111 inset,
    0px -5px 5px 0px #111 inset,
    2px 5px 5px 0px #111;
  border-radius: 5px;
}

#theInput{
 clear: both;
 margin: 25px 100px;
 width: 200px;
 text-align: center;
}
.light {
  width: 5px;
  height: 5px;
  margin: 1px 1px;
  text-align: center;
  font-size: 15px;
  float: left;
  border-radius: 50%;
}

.off{
  background-color: #121212;
}

.on{
  background-color: #0ff;
  box-shadow: 0px 0px 5px #0ff;
}
  </style>
  <script src="/js/jquery-3.6.4.min.js"></script>
</head>
<body>
  <div id="wrapper">
    <div id="theMarquee">
      <div class="row">
        </div>
    </div>
  </div>

  <input id="theInput" type="text" name="input" value="Hello everyone">

  <script>
    function init() {
        for (var i = 0; i <= 6; i++) {
            for (var j = 1; j <= 59; j++) {
                $('.row').append(`<div class="light off ${i}_${j}">`);
            }
            $('.row').append(`<br>`);
        }
    }
    var SCROLLER_LENGTH = 60;
    var HEIGHT = 7;
    var theInput = $('#theInput');
    var fps = 60;

    var myMessage = textToLED('Hello everyone ');
    var leftPointer = SCROLLER_LENGTH + 1;
    var rightPointer = 0;
    var furthestLeftPoint = 0 - myMessage.length;

    theInput.change(function(){
    clearLights();
    myMessage = textToLED(this.value);
    furthestLeftPoint = 0 - myMessage.length;
    leftPointer = SCROLLER_LENGTH + 1;
    });

    function clearLights(){
    var lightsOn = $('.on');
    lightsOn.removeClass('on');
    lightsOn.addClass('off');
    }
    function setLight(row, col, state){
    var theLight = $('.'+row+'_'+col);
    
    if(theLight.hasClass('on') && !state){
        theLight.removeClass('on');
        theLight.addClass('off');
    }else if(theLight.hasClass('off') && state){
        theLight.removeClass('off');
        theLight.addClass('on');
    }
    }

    function drawMessage(messageArray, leftPointer){
    var messageLength = messageArray.length;
    var totalScrollLength = SCROLLER_LENGTH + messageLength;
    
    if(messageLength>0){
        
            for(var col=0;col<messageLength;col++){
        for(var row=0;row<HEIGHT;row++){
            var offsetCol = leftPointer + col;
            
            if(offsetCol<SCROLLER_LENGTH || offsetCol >= 0){
            setLight(row,offsetCol,messageArray[col][row]);
            }
            
        }
        }
        
    }
    }

    function textToLED(theWord){
    var theMessage = [];
    theWord = theWord.toUpperCase();
    for(var i=0;i<theWord.length;i++){
        theMessage.push(charToLED(theWord.charAt(i)));
        theMessage.push(charToLED());
    }
    
    var flatten = [];
    flatten = flatten.concat.apply(flatten, theMessage);
    
    return flatten;
    }

    function charToLED(theChar){
    var theLed = [];
        switch(theChar){
        case 'A' :
        theLed = [[false, false, true, true, true, true, true], 
                    [false, true, false, false, true, false, false], 
                    [true, false, false, false, true, false, false],
                    [false, true, false, false, true, false, false],
                    [false, false, true, true, true, true, true]];
        break;
        case 'B' :
        theLed = [[true, true, true, true, true, true, true], 
                    [true, false, false, true, false, false, true],
                    [true, false, false, true, false, false, true],
                    [true, false, false, true, false, false, true],
                    [false, true, true, false, true, true, false]];
        break;
            case 'C' :
        theLed = [[false, true, true, true, true, true, false], 
                    [true, false, false, false, false, false, true],
                    [true, false, false, false, false, false, true],
                    [true, false, false, false, false, false, true],
                    [false, true, false, false, false, true, false]]; 
        break;
        case 'D' :
        theLed = [[true, true, true, true, true, true, true], 
                    [true, false, false, false, false, false, true],
                    [true, false, false, false, false, false, true],
                    [true, false, false, false, false, false, true],
                    [false, true, true, true, true, true, false]]; 
        break;
        case 'E' :
        theLed = [[true, true, true, true, true, true, true], 
                    [true, false, false, true, false, false, true],
                    [true, false, false, true, false, false, true],
                    [true, false, false, true, false, false, true],
                    [true, false, false, false, false, false, true]];
        break;
        case 'F' :
        theLed = [[true, true, true, true, true, true, true], 
                    [true, false, false, true, false, false, false],
                    [true, false, false, true, false, false, false],
                    [true, false, false, true, false, false, false],
                    [true, false, false, false, false, false, false]];
        break;
        case 'G' :
        theLed = [[false, true, true, true, true, true, false], 
                    [true, false, false, false, false, false, true],
                    [true, false, false, false, false, false, true],
                    [true, false, false, false, true, false, true],
                    [true, true, false, false, true, true, true]];
        break;
        case 'H' :
        theLed = [[true, true, true, true, true, true, true], 
                    [false, false, false, true, false, false, false],
                    [false, false, false, true, false, false, false],
                    [false, false, false, true, false, false, false],
                    [true, true, true, true, true, true, true]];
        break;
        case 'I' :
        theLed = [[false, false, false, false, false, false, false], 
                    [true, false, false, false, false, false, true],
                    [true, true, true, true, true, true, true],
                    [true, false, false, false, false, false, true],
                    [false, false, false, false, false, false, false]];
        break;
        case 'J' :
        theLed = [[false, false, false, false, false, true, false], 
                    [false, false, false, false, false, false, true],
                    [true, false, false, false, false, false, true],
                    [true, true, true, true, true, true, false],
                    [true, false, false, false, false, false, false]];
        break;  
        case 'K' :
        theLed = [[true, true, true, true, true, true, true], 
                    [false, false, false, true, false, false, false],
                    [false, false, true, false, true, false, false],
                    [false, true, false, false, false, true, false],
                    [true, false, false, false, false, false, true]];
        break;
        case 'L' :
        theLed = [[true, true, true, true, true, true, true], 
                    [false, false, false, false, false, false, true],
                    [false, false, false, false, false, false, true],
                    [false, false, false, false, false, false, true],
                    [false, false, false, false, false, false, true]];
        break;
        case 'M' :
        theLed = [[true, true, true, true, true, true, true], 
                    [false, true, false, false, false, false, false],
                    [false, false, true, false, false, false, false],
                    [false, true, false, false, false, false, false],
                    [true, true, true, true, true, true, true]];
        break;
        case 'N' :
        theLed = [[true, true, true, true, true, true, true], 
                    [false, false, true, false, false, false, false],
                    [false, false, false, true, false, false, false],
                    [false, false, false, false, true, false, false],
                    [true, true, true, true, true, true, true]];
        break;
        case 'O' :
        theLed = [[false, true, true, true, true, true, false], 
                    [true, false, false, false, false, false, true],
                    [true, false, false, false, false, false, true],
                    [true, false, false, false, false, false, true],
                    [false, true, true, true, true, true, false]];
        break;
        case 'P' :
        theLed = [[true, true, true, true, true, true, true], 
                    [true, false, false, true, false, false, false],
                    [true, false, false, true, false, false, false],
                    [true, false, false, true, false, false, false],
                    [false, true, true, false, false, false, false]];
        break;
        case 'Q' :
        theLed = [[false, true, true, true, true, true, false], 
                    [true, false, false, false, false, false, true],
                    [true, false, false, false, true, false, true],
                    [true, false, false, false, false, true, false],
                    [false, true, true, true, true, false, true]];
        break;
        case 'R' :
        theLed = [[true, true, true, true, true, true, true], 
                    [true, false, false, true, false, false, false],
                    [true, false, false, true, false, false, false],
                    [true, false, false, true, false, false, false],
                    [false, true, true, false, true, true, true]];
        break;
        case 'S' :
        theLed = [[false, true, true, false, false, false, true], 
                    [true, false, false, true, false, false, true],
                    [true, false, false, true, false, false, true],
                    [true, false, false, true, false, false, true],
                    [true, false, false, false, true, true, false]];
        break;
        case 'T' :
        theLed = [[true, false, false, false, false, false, false], 
                    [true, false, false, false, false, false, false],
                    [true, true, true, true, true, true, true],
                    [true, false, false, false, false, false, false],
                    [true, false, false, false, false, false, false]];
        break;
        case 'U' :
        theLed = [[true, true, true, true, true, true, false], 
                    [false, false, false, false, false, false, true],
                    [false, false, false, false, false, false, true],
                    [false, false, false, false, false, false, true],
                    [true, true, true, true, true, true, false]];
        break;
        case 'V' :
        theLed = [[true, true, true, true, true, false, false], 
                    [false, false, false, false, false, true, false],
                    [false, false, false, false, false, false, true],
                    [false, false, false, false, false, true, false],
                    [true, true, true, true, true, false, false]];
        break;
        case 'W' :
        theLed = [[true, true, true, true, true, true, false], 
                    [false, false, false, false, false, false, true],
                    [false, false, false, false, true, true, false],
                    [false, false, false, false, false, false, true],
                    [true, true, true, true, true, true, false]];
        break;
        case 'X' :
        theLed = [[true, false, false, false, false, false, true], 
                    [false, true, true, false, true, true, false],
                    [false, false, false, true, false, false, false],
                    [false, true, true, false, true, true, false],
                    [true, false, false, false, false, false, true]];
        break;
        case 'Y' :
        theLed = [[true, false, false, false, false, false, false], 
                    [false, true, false, false, false, false, false],
                    [false, false, true, true, true, true, true],
                    [false, true, false, false, false, false, false],
                    [true, false, false, false, false, false, false]];
        break;
        case 'Z' :
        theLed = [[true, false, false, false, false, true, true], 
                    [true, false, false, false, true, false, true],
                    [true, false, false, true, false, false, true],
                    [true, false, true, false, false, false, true],
                    [true, true, false, false, false, false, true]];
        break;
        default:
        theLed = [[false, false, false, false, false, false, false]];
    }  
    return theLed;
    }


    function draw() {
        setTimeout(function() {
            requestAnimationFrame(draw);
        
            if(leftPointer==furthestLeftPoint){
                leftPointer = SCROLLER_LENGTH + 1;
        }
        
        drawMessage(myMessage, leftPointer);
        leftPointer--;     
                
        }, 1000 / fps);
    }

    init();
    draw();



  </script>
</body>
</html>
-->