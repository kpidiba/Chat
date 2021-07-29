<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/games/hero/index.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div id="score"></div>
        <canvas id="game" width="375" height="375"></canvas>
        <div id="introduction">Hold down the mouse to stretch out a stick</div>
        <div id="perfect">DOUBLE SCORE</div>
        <button id="restart">RESTART</button>
      </div>
      
      {{-- <a id="youtube" href="https://youtu.be/eue3UdFvwPo" target="_blank">
        <span>See how this game was made</span>
      </a> --}}
      {{-- <div id="youtube-card">
        How to create a Stick Hero game with JavaScript and HTML Canvas
    </div> --}}
    <script src="{{ asset('js/games/hero/index.js') }}" ></script>
</body>
</html>