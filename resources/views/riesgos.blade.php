<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión de riesgos | Analítica Solidaria</title>
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
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semitransparente para el texto */
            padding: 10px; /* Espacio interno del texto */
            border: 1px solid rgba(255, 255, 255, 0.8); /* Borde alrededor del texto */
        }
        .text-overla {
            position: absolute;
            top: -50px; /* Ajusta la posición vertical del texto */
            left: 10px; /* Ajusta la posición horizontal del texto */
            width: 730px;
            padding: 10px; /* Espacio interno del texto */
        }
        #boton {
            background: transparent;
            border: 2px solid RGB(0 130 130);
            color: RGB(0 130 130);
            text-decoration: none;
            border-radius: 25px;
            transition: RGB(0 130 130) , color RGB(0 130 130);
        }

       

    </style>
</head>
<body>
    <!-- Navbar y Cabecera -->
    @include('partials.navbar')

<div class="container mt-5">   
        <div class="col-md-6 mt-0 ">
        <!-- Contenedor de la imagen y el texto -->
        <div class="image-container">
            <img src="{{ asset('img/image22.png') }}" style="" class="image" alt="Imagen">
            <!-- Texto que se superpone a la imagen -->
            <div class="text-overla" style="margin-left: 1080px; margin-top: 100px; font-size: 60px">
            <img src="{{ asset('img\image28.png') }}" alt="Icono 2" class="img-fluid" style="width: 80px;"><br>
            </div>

            <div class="text-overlay" style="margin-left: 450px; margin-top: 100px; font-size: 50px">
                <a class="fas fa" style="color: #000;text-decoration: none;" href="{{ route('cifras') }}"><span> GESTION DE RIESGOS</span></a>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-left: 180px; margin-right: 100px;">
        <div style="flex: 1; margin-right: 10px;"> <!-- Añade margen derecho al texto -->
            <p class="fas fa">¡Mantente alerta! Detecta a tiempo todos los riesgos de lavado de dinero que puedan afectar a tu empresa.<br> 
                Podras evaluar constantemente a tus clientes y contrapartes para prevenir cualquier riesgo relacionado <br>con el lavado de capitales, 
                la evasion fiscal o el fraude.</p>
        </div>
        <div>
            <a href="#" id="boton" class="fas fa btn btn-primary" style="margin-left: 10px;"> RIESGOS</a> <!-- Añade margen izquierdo al botón -->
        </div>
    </div>
</div>
    <!-- footer -->
    @include('footer.footer')
</body>
</html>
