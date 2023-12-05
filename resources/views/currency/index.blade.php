<!-- resources/views/currency/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <title>Marquesina de Indicadores</title>
    <style>
        .marquesina{
            /* background-color: rgb(197, 189, 189); */
            background-color: RGB(220 162 17); 
            margin-left: 270px;
            width: 1500px;
            color: black;
            font-family: 'Open Sans', sans-serif;
            font-weight: bold;
            border-radius: 15px;
        }
        #separador{
            color: RGB(0 130 130) ;
        }
    </style>
</head>
<body>
    <br>
<br>
<div class="marquesina">
    <marquee behavior="scroll" direction="left" style="width: 100%;">
        @foreach ($rates as $currency => $rate)
            <span style="display: inline-block; margin-right: 20px;">{{ $currency }}: {{ $rate }}<a id="separador">&nbsp;&nbsp;&nbsp;&nbsp;|</a></span>
        @endforeach

        @foreach ($Marquesina as $dato)
            <span style="display: inline-block; margin-right: 20px;">{{ $dato->datoIndicador }} + {{ $dato->valor }}<a id="separador">&nbsp;&nbsp;&nbsp;&nbsp;|</a></span>
        @endforeach
    </marquee>
</div>

</div>
</body>
</html>
