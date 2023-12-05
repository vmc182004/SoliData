<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos CSS para el pie de página */
        .boletin {
            background-image: url('{{ asset("img/boletin.PNG") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: white;
            padding: 20px 0;
            height: 300px;
            margin-left: 5.5%;
            position: relative;
            font-family: 'Open Sans', sans-serif;
        }

        /* Estilos para el botón Suscribirse */
        #subscribe-button {
            position: absolute;
            top: 15%; /* Centra verticalmente el botón */
            right: 10%; /* Alinea a la derecha */
            transform: translateY(-50%); /* Alinea verticalmente con respecto al centro */
            background: transparent;
            border: 2px solid RGB(0 130 130);
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            color: RGB(0 130 130);
            text-decoration: none;
            border-radius: 25px;
            transition: RGB(0 130 130) , color RGB(0 130 130);
        }

        #subscribe-button:hover {
            background: RGB(0 130 130);
            color: white;
        }

        /* Estilos para el cuadro blanco */
        .white-box {
            position: absolute;
            bottom: 10%;
            left: 10%;
            right: 10%;
            background: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            font-size: 30px;
        }

        /* Estilos para la campana */
        #campana {
            margin-left: 0px; /* Añade margen izquierdo para mover solo la campana */
            margin-top: -50px;
            color: RGB(0 130 130);
            text-decoration: none;
            font-size:50px;

        }
        /* Estilos CSS para el ícono personalizado */
        
    </style>
</head>
<body>
    @foreach ($boletine as $boletine)
    <div class="boletin" style="background-image: url('{{ asset($boletine->image_boletin) }}');">
        <!-- El contenido del boletín aquí -->  
    <a class="fas fa-newspaper newsletter-icon" href="{{ route('boletin') }}" style="margin-left:10%; font-size:40px; color: rgb(0, 0, 0); text-decoration: none;font-family: 'Open Sans', sans-serif;"> <b> {{ $boletine->titulo_boletin }}</b></a>
    <!-- Ícono de la campana -->
    <a id="subscribe-button" style="font-family: 'Open Sans', sans-serif;" href="{{ route('boletin') }}"> {{ $boletine->nombreBoton_boletin }}</a>
    
    <!-- Contenido de tu pie de página aquí -->
    <div class="white-box">
    
        <!-- Contenido de tu cuadro blanco aquí -->
        <img src="{{ asset($boletine->icono_boletin) }}" alt="{{ $boletine->titulo_boletin }}" class="img-fluid" style="height: 50px;margin-top:2px; " id="campana"></a>
        <b><a class="fas fa" style="color:RGB(0 130 130);text-decoration: none;font-family: 'Open Sans', sans-serif;" href="{{ route('boletin') }}"> <span>{{ $boletine->texto_boletin }}</span></a></b>
        <a class="fas fa"  style="color:RGB(0 130 130);text-decoration: none;font-size:50px;font-family: 'Open Sans', sans-serif;" id="custom-icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $boletine->año_boletin }}</a>
    </div>
    </div>
    @endforeach


</body>
</html>
