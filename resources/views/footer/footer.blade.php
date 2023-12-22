<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos CSS para el pie de página */
        footer {
            color: white;
            padding: 40px 0;
            background-color: #012060;
            text-align: center;
            width: 86.6%;
            margin-left: 5.5%;

        }
        .footer-content {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            margin-left: 5%;
        }
        .logo {
            width: 300px; /* Tamaño del logo */
        }
        .contact-info {
            font-size: 13px;
        }
        .contact-info p {
            margin: 5px 0;
        }
        .social-media {
            display: flex;
            flex-direction: column; /* Para colocar los iconos uno debajo del otro */
            align-items: center;
            text-align: center; /* Para centrar el texto "Redes Sociales" */
            margin-left: -200px;
        }
        .social-media a {
            color: white;
            font-size: 16px; /* Tamaño de los iconos */
        }
        .social-title {
            font-size: 14px; /* Tamaño del título "Redes Sociales" */
            margin-bottom: 5px; /* Espacio entre el título y los iconos */
        }
        body {
            margin: 0;
            font-family: 'GlacialIndifference-Bold', sans-serif;
        }
      
        .survey-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 1%;
        }
        .survey-title a {
            color: #008282;
            text-decoration: none;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .survey-title a i {
            margin-right: 10px;
        }
        .survey-text {
            color: #000;
            text-align: center;
            margin-top: 20px;
        }
        .btn-realizar {
            background-color: #008282;
            border: 2px solid #008282;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .btn-realizar:hover {
            background-color: #005353;
        }
        @font-face {
        font-family: 'GlacialIndifference-Bold';
        src: url('../public/font/GlacialIndifference-Bold.otf') format('opentype');
        }
        @font-face {
        font-family: 'GlacialIndifference-Regular';
        src: url('../../public/font/GlacialIndifference-Regular.otf') format('opentype');
        }

    </style>
</head>
<body>
<footer>
    <div class="footer-content">
        <div>


            <img src="{{ asset('img/solidata1.jpg') }}" style="height: 150px; width:400px;" alt="Logo" class="logo">
            <br>
            <br>
            <br>

            <div class="contact-info">
                <a class="fas " href="{{route ('tel') }}" style="color: white; text-decoration: none;font-family: 'GlacialIndifference-Bold', sans-serif;font-size:15px;"> 301-215-9933</a>
                <br>
                <a class="fas " href="{{route ('location') }}" style="color: white; text-decoration: none;font-family: 'GlacialIndifference-Bold', sans-serif;font-size:15px;"> Cra 76A #3C-35</a>
                <br>
                <a class="fas" href="{{route ('email') }}" style="color: white; text-decoration: none;font-family: 'GlacialIndifference-Bold', sans-serif;font-size:15px;"> esteban.analista riesgosyanaliticasolidaria.onmicrosft.com</a>
            </div>
        </div>
       
        <!-- Espacio para la encuesta -->
        <div class="survey-container">
            <h2 class="survey-title">
                <a href="#" style="text-decoration: none;">
                    <i class="fas fa-poll" style="color: #008282;"></i> ENCUESTA
                </a>
            </h2>
            <p class="survey-text">
                Nos permitimos comunicar que ANALITICA SOLIDARIA cuenta en su base de datos integrada con información suministrada por usted en el desarrollo de actividades propias...
            </p>
            <a class="btn-realizar" href="#">REALIZAR</a>
        </div>

        <!-- --------------------------------- -->
        <div class="social-media">
            <a class="fa-solid " href="#" style="color: white; text-decoration: none;font-family: 'GlacialIndifference-Bold', sans-serif;"> REDES SOCIALES</a>
            <br>
             <!-- Icono de WhatsApp -->
             <a href="{{route ('wpp') }}" class="social-icon" style="color: white ; font-size: 50px;"><i class="fab fa-whatsapp"></i></a>
            
             <!-- Icono de Instagram -->
             <a href="{{route ('instagram') }}" class="social-icon" style="color: white ; font-size: 50px;"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>
</body>
</html>