<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de inicio | Analítica Solidaria</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <!-- Agrega la referencia a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

        #text {
            margin-top: 20px;

        }

        #btnNosotros {
            font-family: 'Open Sans', sans-serif;
        }


        .card-text-container {
            margin-top: 0;
            margin-bottom: 1rem;
            text-align: center;

        }

        .card-text {
            font-size: 30px;
        }

        .card-text-container p {
            margin-top: 0.5rem;
            /* Espacio entre los párrafos */
        }

        .col-lg-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%;

        }

        /* Agrega estos estilos para la tarjeta del producto 999 */
        .special-product-card {
            border: 1px solid #ccc;
            /* Borde gris */
            border-radius: 10px;
            /* Bordes redondeados */
        }



        .special-product-card .card-img-top {
            height: 320px;
            width: 100%;
            display: block;
            position: relative;
            border-top-right-radius: 30px;
            border-top-left-radius: 30px;
        }

        .special-product-card .card-body {
            text-align: center;

        }

        .special-product-card .card-title {
            color: #008282;
            text-align: center;
            font-family: 'Open Sans', sans-serif;
            font-size: 22px;
            font-weight: bold;

        }

        .special-product-card .card-text {
            font-size: 17px;
            font-family: 'Open Sans', sans-serif;
            font-weight: bold;
            text-align: center;
        }

        .special-product-card .card-precio {
            font-size: 20px;
            font-family: 'Open Sans', sans-serif;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- CABECERA -->

    @include('partials.navbar')

    <!-- -->
    @include('currency.index')

    <!-- carousel -->
    <div id="carouselExampleDark" class="carousel carousel-dark slide mt-3" data-bs-ride="carousel"
        style="margin-left: 270px; width: 80%;">
        <div class="carousel-indicators">
            @foreach ($carrusel as $key => $item)
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($carrusel as $key => $item)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="10000">
                    <img src="{{ asset($item->image_carrusel) }}" class="d-block" alt="..."
                        style="height: 700px; width: 1500px;">
                    <div class="carousel-caption d-none d-md-block" style="text-align: right;">
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- iconos -->

    <div class="container mt-5">
        <div class="row text-center">
            @foreach ($iconos as $icono)
                <div class="col-md-3">
                    <div class="icon-box">
                        <!-- Coloca la imagen dinámica -->
                        <img src="{{ asset($icono->image_icono) }}" alt="{{ $icono->name_icono }}" class="img-fluid"
                            style="height: 140px; width: 180px; margin-left:70px">
                        <a class="iconos"
                            style="color: #000; text-decoration: none; font-size: 20px; margin-left:70px; font-family: 'Open Sans', sans-serif;font-weight: bold; "><span>{{ $icono->name_icono }}</span></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- contenido -->
    <div class="container mt-5 mb-5">
        <div class="row">
            @foreach ($contenido as $contenido)
                <div class="col-md-6">
                    <img src="{{ asset($contenido->image_contenido) }}" alt="{{ $contenido->titulo_contenido }}"
                        class="img-fluid" alt="Imagen" height="500px" width="500px">
                </div>
                <div class="col-md-6" id="text" style="font-family: 'Open Sans', sans-serif;">
                    <a class=""
                        style="color:RGB(0 130 130);text-decoration: none;font-size: 40px; font-family: 'Open Sans', sans-serif;"
                        href="#"><span><b>{{ $contenido->titulo_contenido }}</b></span></a>
                    <br><br>
                    <h5 style="font-family: 'Open Sans', sans-serif;"> {{ $contenido->texto_contenido }}
                    </h5>
                    <br>
                    <a href="#" class="btn btn-primary btn-lg btn-block" id="btnNosotros"
                        style="background-color: RGB(0, 130, 130); border: RGB(0, 130, 130);font-family: 'Open Sans', sans-serif;">
                        <b>{{ $contenido->name_boton }}</b>
                    </a>
                </div>

            @endforeach
        </div>
    </div>
    <!-- Productos -->
    <div class="mt-5">
        <h1
            style="text-align: center; color: RGB(0, 130, 130); border: RGB(0, 130, 130); font-family: 'Open Sans', sans-serif; font-weight: bold;">
            INFORMES</h1>
    </div>
    <br>
    <br>

   
                       
    <!-- boletin -->
    <br>
    @include('footer.boletin')
    <!-- footer -->
    <br>
    @include('footer.footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
