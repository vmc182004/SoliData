<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos CSS para el pie de página */
        footer {
            background-color: black;
            color: white;
            padding: 20px 0;
            margin-left: 5.5%;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: 5%;
            margin-bottom: 3%;
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
        }

        .social-media a {
            color: white;
            margin: 5px 0; /* Espacio entre los iconos */
            font-size: 20px; /* Tamaño de los iconos */
        }

        .social-title {
            font-size: 16px; /* Tamaño del título "Redes Sociales" */
            margin-bottom: 10px; /* Espacio entre el título y los iconos */
        }

      /* Estilos para la encuesta */
      .survey-container {
    background-color: rgb(243, 243, 235);
    padding: 20px;
    border: 2px solid #000;
    width: 500px; /* Cambia a un valor en píxeles */
    height: 230px; /* Alto deseado, puedes cambiar el valor */
    text-align: center;
    border-radius: 20px;
}

.survey-title {
    font-size: 20px;
    color: black;
    
}

    </style>
</head>
<body>
<footer>
    <div class="footer-content">
        <div>
            <img src="{{ asset('img/logo3.png') }}" style="height: 150px; width:120px;" alt="Logo" class="logo">

            <img src="{{ asset('img/image23.png') }}" style="height: 150px; width:150px;" alt="Logo" class="logo">
            <br>
            <br>
            <br>

            <div class="contact-info">
                <a class="fas fa-phone" href="{{route ('tel') }}" style="color: white; text-decoration: none;"><span style="font-weight: bold;font-family: 'Open Sans', sans-serif;font-size: 18px;"> 301-215-9933</span></a>
                <br>
                <a class="fas fa-map-marker" href="{{route ('location') }}" style="color: white; text-decoration: none;"><span style="font-weight: bold;font-family: 'Open Sans', sans-serif;font-size: 18px;"> Cra 76A #3C-35</span></a>
                <br>
                <a class="fas fa-envelope" href="{{route ('email') }}" style="color: white; text-decoration: none;"><span style="font-weight: bold;font-family: 'Open Sans', sans-serif;font-size: 18px;"> esteban.analista riesgosyanaliticasolidaria.onmicrosft.com</span></a>
            </div>
        </div>
       
        <!-- Espacio para la encuesta -->
        {{-- <div class="survey-container">
            <h2 class="survey-title" >
                <a class="fas fa-poll" href="#" style="color: rgb(0, 0, 0); text-decoration: none; "> ENCUESTA</a>
                <br>
            </h2>
            <p style="color: #000;">Nos permitimos comunicar que ANALITICA SOLIDARIA<br>
                cuenta en su base de datos integrada con informacion 
                <br>suministrada por usted en el desarrollo de actividades<br>
                 propias...</p>
            <!-- Aquí puedes agregar el contenido de tu encuesta -->
            <a class="btn btn-secondary ml-2" style=" background-color:RGB(0 130 130); border:RGB(0 130 130); width: 100px;"  href="#">REALIZAR</a>

        </div> --}}
        
        {{-- <div class="social-media">
            <a class="fa-solid fa-paper-plane" href="#" style="color: white; text-decoration: none; margin-top: 10%;"> REDES SOCIALES</a>
            <br>
             <!-- Icono de WhatsApp -->
             <a href="{{route ('wpp') }}" class="social-icon" style="color: white ; font-size: 50px;"><i class="fab fa-whatsapp"></i></a>
            
             <!-- Icono de Instagram -->
             <a href="{{route ('instagram') }}" class="social-icon" style="color: white ; font-size: 50px;"><i class="fab fa-instagram"></i></a>
        </div> --}}
    </div>
</footer>
</body>
</html>
