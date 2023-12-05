<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadisticas del sector | Analítica Solidaria</title>
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
        /*  */
        .accordion-button {
            cursor: pointer;
            margin-left: 300px;
            background-color: #EBE9E9;
            width: 450px;
            height: 50px;
            margin-top: 5px;

        }

        .accordion-content {
            display: none;
            margin-left: 300px;
            width: 450px;

        }
        .titu{
            margin-left: 300px;
            background-color: #008282;
            color: white;
            width: 450px;
            height: 50px;
            margin-top: 5px;
        }
        .line {
            border: 1px solid #008282; /* Color verde (#00FF00) y grosor de 1 píxel */
            width: 100px; /* Ancho de la línea */
        }
        .green-box {
            background-color: #7EB7B7;
            width: 45%;
            margin-right: 10px;
            padding: 10px;
            float: left;
        }
        .green-box-2 {
            background-color: #7EB7B7;
            width: 51%;
            margin-right: 10px;
            padding: 10px;
            float: left;
        }

    </style>
</head>
<body>
    <!-- Navbar y Cabecera -->
    @include('partials.navbar')

    <div class="col-md-6 mt-0 ">
        <!-- Contenedor de la imagen y el texto -->
        <div class="image-container">
            <img src="{{ asset('img/image21.png') }}" style="margin-left: 180px;" class="image" alt="Imagen">
            <!-- Texto que se superpone a la imagen -->
            <div class="text-overla" style="margin-left: 1150px; margin-top: 100px; font-size: 60px">
            <img src="{{ asset('img\image29.png') }}" alt="Icono 2" class="img-fluid" style="width: 80px;"><br>
            </div>

            <div class="text-overlay" style="margin-left: 600px; margin-top: 100px; font-size: 40px">
                <a class="fas fa" style="color: #000;text-decoration: none;" href="{{ route('cifras') }}"><span> ESTADISTICAS DEL SECTOR</span></a>
            </div>
        </div>
    </div>
|<br>
<div class="">
        <!-- ... (código HTML anterior) ... -->
    <div class="fas fa titu" onclick="toggleAccordion('button1')"> 
        <div style="margin-top: 10px;">&nbsp;&nbsp;ESTADISTICAS DEL SECTOR</div>
    </div>

    <div class="fas fa accordion-button" onclick="toggleAccordion('button1')"> 
        <div style="margin-top: 10px;">• CIFRAS GENERALES</div>
    </div>

    <div class="accordion-content" id="button1">
        Información para el Botón 1. Puede ser texto, imágenes, videos, etc.
    </div>

    <div class="fas fa accordion-button" onclick="toggleAccordion('button2')"> 
        <div style="margin-top: 10px;">• GESTION DE RIESGOS</div>
    </div>

    <div class="accordion-content" id="button2">
        Información para el Botón 2.
    </div>

    <div class="fas fa accordion-button" onclick="toggleAccordion('button3')"> 
        <div style="margin-top: 10px;">• RESUMEN EJECUTIVO</div>
    </div>

    <div class="accordion-content" id="button3">
        Información para el Botón 3.
    </div>

    <div class="fas fa accordion-button" onclick="toggleAccordion('button4')"> 
        <div style="margin-top: 10px;">• CIFRAS DE LA INDUSTRIA</div>
    </div>

    <div class="accordion-content" id="button4">
        Información para el Botón 4.
    </div>

    <div class="fas fa accordion-button" onclick="toggleAccordion('button5')"> 
        <div style="margin-top: 10px;">• VISUALIZADOR INTELIGENTE DE CIFRAS</div>
    </div>

    <div class="accordion-content" id="button5">
        Información para el Botón 5.
    </div>

    <div class="fas fa accordion-button" onclick="toggleAccordion('button6')"> 
        <div style="margin-top: 10px;">• DEFINICION DE LOS INDICADORES DEL SECTOR</div>
    </div>

    <div class="accordion-content" id="button6">
        Información para el Botón 6.
    </div>
</div>
<!-- ... ... -->
<div class="content-container" style="margin-left: 850px; width: 500px; margin-top: -27%;">
        <div class="text-container">
            <h3 class="fas fa">Estadisticas del Sector</h3>
            <br><br>
            <h5 class="" style="color: #008282;"><b>Sistema de Información Estadística de Analítica Solidaria actualmente.</b></h5>
            <h5>Mediante un proceso de recopilación de información, el gremio pone a disposición del público una herramienta de gran utilidad para el análisis de la evolución del renglón de seguros.</h5>
            <br>
            <div class="line"></div>
            <br>
            <h5 class="fas fa">CONTACTO</h5>
            <br><br>
    <!-- Cuadros verdes -->
    <div class="green-box">
        <h6 style="color: #008282;"><b>Director de Estadisticas</b></h6>
        <h6 class="fas fa" style="color: black;"><b>Andre P. Ojuela</b></h6>
        <h6 style="color: #008282;"><b>Andere12df@gmail.com</b></h6>
        <h6 class="" style="color: black;"><b>Analitica Solidaria</b></h6>
    </div>

    <div class="green-box-2">
        <h6 style="color: #008282;"><b>Profesional de Estadisticas</b></h6>
        <h6 class="fas fa" style="color: black;"><b>Jose A. Zapata</b></h6>
        <h6 style="color: #008282;"><b>Jose121AD@gmail.com</b></h6>
        <h6 class="" style="color: black;"><b>Analitica Solidaria</b></h6>
        </div>
    </div>
</div>
    
    

    <br><br><br><br><br><br><br>

    <br><br> 
  
    <br>
    <!-- footer -->
    @include('footer.footer')
    <script>
        function toggleAccordion(id) {
            var content = document.getElementById(id);
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        }
    </script>
</body>
</html>
