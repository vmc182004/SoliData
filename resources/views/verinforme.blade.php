<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>informe desbloqueado | Analítica Solidaria</title>
    <style>
      
       .nombreContenido{
        margin-top: 80px;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
        color: #008282;
        font-size: 50px;
        font-weight: bold;
       }
       .contenidoDesbloqueado {
            margin-top: 20px;
            text-align: center;
            margin-left: 200px;
            width: 80%; /* Ancho del contenedor */
            height: 600px; /* Alto del contenedor */
            border: 1px solid #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden; /* Para ocultar el desbordamiento si es necesario */
        }

        /* Estilos específicos para el contenido de Power BI si es necesario */
        .contenidoDesbloqueado iframe {
            width: 100%;
            height: 100%;
            border: none; /* Para quitar el borde del iframe si lo tiene */
        }
    </style>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')


    <div class="nombreContenido">
        {!! $product->name !!}
    </div>
    <div class="contenidoDesbloqueado">
    {!! $product->contenido !!}
    </div>
       

    <br>
    <br>
    @include('footer.footer')
</body>
</html>
