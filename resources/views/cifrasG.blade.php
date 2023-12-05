<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cifras generales | Analítica Solidaria</title>
    <style>
        /* Estilo para el imagen */

        .image {
            max-width: 100%; /* Asegura que la imagen no se desborde */
        }

        /* Estilo para el texto que se superpone a la imagen */
        .text-overlay {
            position: absolute;
            top: 50px; /* Ajusta la posición vertical del texto */
            left: 10px; /* Ajusta la posición horizontal del texto */
            width: 730px;
            background-color: rgba(255, 255, 255, 0.4); /* Fondo semitransparente para el texto */
            padding: 10px; /* Espacio interno del texto */
            border: 1px solid rgba(255, 255, 255, 0.4); /* Borde alrededor del texto */
        }
        .text-overla {
            position: absolute;
            top: -50px; /* Ajusta la posición vertical del texto */
            left: 10px; /* Ajusta la posición horizontal del texto */
            width: 730px;
            padding: 10px; /* Espacio interno del texto */
        }
        .cifras{
            background-color: white;
            height: 300px;
            margin-left: 280px;
        }
        .line {
            border: 2px solid #008282; /* Color verde (#00FF00) y grosor de 1 píxel */
            width: 210px; /* Ancho de la línea */
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar y Cabecera -->
    @include('partials.navbar')
<!--  -->
<br>
<br>
<br>
<br>
<!--  -->
    <div class="col-md-6 mt-0 ">
        <!-- Contenedor de la imagen y el texto -->
        <div class="image-container">
            <img src="{{ asset('img/image20.png') }}" style="margin-left: 280px;" class="image" alt="Imagen">
            <!-- Texto que se superpone a la imagen -->

            <div class="text-overla" style="margin-left: 1270px; margin-top: 100px; font-size: 60px">
            <img src="{{ asset('img\image27.png') }}" alt="Icono 2" class="img-fluid" style="width: 80px;"><br>
            </div>

            <div class="text-overlay" style="margin-left: 700px; margin-top: 100px; font-size: 60px; font-family: 'Open Sans', sans-serif; font-weight: bold;">
                <a class="" style="color: #000;text-decoration: none;" href="{{ route('cifras') }}"><span> Cifras generales</span></a>
            </div>
        </div>
    </div>
<br>
<div class="cifras" style="display: flex;">
        <div style="flex: 1; background-color: white; height: 300px;">
        <div class="fas fa-chart-bar" style="margin-top: 100px;color: #000; margin-left: 50px;text-decoration: none;font-size: 60px;">
    </div>
    <div class="fas fa">
    <a class="fas fa" href="#" style="color: #000; margin-left: 20px;text-decoration: none;font-size: 20px;"><span>  CIFRAS GENERALES</span></a>
    <div class="line"></div>
    <a class="fas fa" style="text-decoration: none; color:#008282; margin-left:20px;margin-top:10px;" href="#">Ver mas</a><a class="fas fa-arrow-circle-right" href="#" style="text-decoration: none;"></a>
        
    </div>
    </div>
        <div style="flex: 1; background-color: white; height: 300px;">
    </div>
        <div style="flex: 1; background-color: white; height: 300px;"></div>
    </div>
<br>
<br>
  
<br>
    <!-- footer -->
    @include('footer.footer')
</body>
</html>
