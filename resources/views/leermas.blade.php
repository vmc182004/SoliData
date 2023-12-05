<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Noticia completa | Analítica Solidaria</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .containerNoti {
            width: 40%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 280px;
        }

        .containerNoti h1 {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .containerNoti p {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .containerNoti img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
            
        }
 /* Estilo para la línea vertical */

 /* Estilo para la sección de tarjetas */
    
    </style>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

   
        <div class="containerNoti" style="flex: 1;">
            <h1>{{ $noticia->titulo_noticia }}</h1>
            <p>{{ $noticia->fecha_noticia }}</p>
            <img src="{{ asset($noticia->image_noticia) }}" alt="{{ $noticia->titulo_noticia }}">
            <p>{!! $noticia->texto_largo !!}</p>

            <!-- Línea vertical -->
            <div class="vertical-line"></div>
        </div>
        <div class="card-section">
            <!-- Tarjetas de otras noticias -->
            <!-- Mantén este código para mostrar las tarjetas de noticias -->
        </div>
    
    @include('footer.footer')
</body>
</html>