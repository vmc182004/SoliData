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

    <div class="row" style="margin-left: 250px;">
        <!--  -->
        <div class="container">

            <div class="justify-content-center">
                    <div class="row">
                                    <!-- Producto especial con ID 999 -->
        @php
        $specialProduct = $productos->where('id', 999)->first();
    @endphp
    @if ($hasPurchased[$specialProduct->id])
        <!-- Agregar lógica específica si el producto especial se ha comprado -->
    @else
        @if ($specialProduct)
            <div class="col-lg-4">
                <div class="card special-product-card"
                    style="border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-top-right-radius: 30px;border-top-left-radius: 30px;">
                    <img src="{{ asset($specialProduct->image_path) }}" alt="{{ $specialProduct->name }}"
                        class="card-img-top mx-auto" style="height: 300px; width: 100%; display: block;"
                        alt="{{ $specialProduct->image_path }}">
                    <div class="card-body">
                        <h6 class="card-title">
                            {{ $specialProduct->name }}
                        </h6>
                        @if (Auth::check())
                            @if ($user->cliente->activos > $constantAssets)
                                <p class="card-precio">
                                    <small class="text-muted"
                                        style="font-size:20px; font-family: 'Open Sans', sans-serif; font-size:16px;font-weight: bold;text-align: center;">
                                        Precio: {{ number_format($specialProduct->maxPrice, 0, ',', '.') }} COP
                                    </small>
                                </p>
                            @else
                                <p class="card-precio">
                                    <small class="text-muted"
                                        style="font-size:20px; font-family: 'Open Sans', sans-serif; font-size:16px;font-weight: bold;text-align: center;">
                                        Precio: {{ number_format($specialProduct->minPrice, 0, ',', '.') }} COP
                                    </small>
                                </p>
                            @endif
                        @else
                            <h6>Inicia sesión para comprar y visualizar el informe</h6>
                        @endif
                        {{-- <p class="card-precio">{{ number_format($specialProduct->price, 0, ',', '.') }} COP</p> --}}
                        <!-- Agregar botón "Ver detalles" que abrirá el modal -->
                        @if ($hasPurchased[$specialProduct->id])
                            <div class="product-content">
                                {{-- Lógica específica si el producto especial se ha comprado --}}
                            </div>
                        @else
                            {{-- Lógica si el producto especial no se ha comprado --}}
                        @endif

                        <br>
                        <br>
                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $specialProduct->id }}" id="id" name="id">
                            <input type="hidden" value="{{ $specialProduct->name }}" id="name"
                                name="name">
                            @if (Auth::check())
                                @if ($user->cliente->activos > $constantAssets)
                                    <input type="hidden" value="{{ $specialProduct->maxPrice }}" id="price"
                                        name="price">
                                @else
                                    <input type="hidden" value="{{ $specialProduct->minPrice }}" id="price"
                                        name="price">
                                @endif
                            @endif
                            <input type="hidden" value="{{ $specialProduct->image_path }}" id="img"
                                name="img">
                            <input type="hidden" value="1" id="quantity" name="quantity">
                            <div class="card-footer" style="background-color: white;">
                                <div class="row">
                                    @if (Auth::check())
                                        @if ($hasPurchased[$specialProduct->id])
                                            <!-- Agregar lógica específica si el producto especial se ha comprado -->
                                        @else
                                            <button class="btn btn-secondary btn-sm" class="tooltip-test"
                                                title="add to cart">
                                                <i class="fa fa-shopping-cart"></i> agregar al carrito
                                            </button>
                                        @endif
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endif
                        @foreach ($productos as $producto)
                            @if ($producto->id != 999)
                                <div class="col-lg-4">
                                    <div class="card mb-3" style="border-radius: 30px;">
                                        <img src="{{ asset($producto->image_path) }}" alt="{{ $producto->name }}"
                                            style=" height: 250px; width: 100%; border-top-left-radius: 30px; border-top-right-radius: 30px; border-bottom-left-radius: 0; border-bottom-right-radius: 0; ">

                                        <div class="card-body">
                                            <h5 class="card-title"
                                                style="color: #008282; text-align: center;font-family: 'Open Sans', sans-serif; font-size:22px;font-weight: bold;">
                                                {{ $producto->name }}</h5>
                                            <div class="card-text-container">
                                                <p class="card-text"
                                                    style="font-size:17px; font-family: 'Open Sans', sans-serif;font-weight: bold;">
                                                    {{ $producto->description }}</p>
                                                    @if (Auth::check())
                                                    @if ($user->cliente->activos > $constantAssets)
                                                        <p class="card-precio">
                                                            <small class="text-muted"
                                                                style="font-size:20px; font-family: 'Open Sans', sans-serif; font-size:16px;font-weight: bold;text-align: center;">
                                                                Precio: {{ number_format($producto->maxPrice, 0, ',', '.') }} COP
                                                            </small>
                                                        </p>
                                                    @else
                                                        <p class="card-precio">
                                                            <small class="text-muted"
                                                                style="font-size:20px; font-family: 'Open Sans', sans-serif; font-size:16px;font-weight: bold;text-align: center;">
                                                                Precio: {{ number_format($producto->minPrice, 0, ',', '.') }} COP
                                                            </small>
                                                        </p>
                                                    @endif
                                                @else
                                                    <h6>Inicia sesión para comprar y visualizar el informe</h6>
                                                @endif
                                                {{-- @if (Auth::check())
                                                    @if ($user->cliente->activos > $constantAssets)
                                                        <p class="card-precio">
                                                            <small class="text-muted"
                                                                style="font-size:20px; font-family: 'Open Sans', sans-serif; font-size:16px;font-weight: bold;text-align: center;">
                                                                Precio:{{ number_format($producto->maxPrice, 0, ',', '.') }}COP
                                                            </small>
                                                        </p>
                                                    @else
                                                        <p class="card-precio">
                                                            <small class="text-muted"
                                                                style="font-size:20px; font-family: 'Open Sans', sans-serif; font-size:16px;font-weight: bold;text-align: center;">
                                                                Precio:{{ number_format($producto->minPrice, 0, ',', '.') }}COP
                                                            </small>
                                                        </p>
                                                    @endif
                                                @else
                                                    <h6>Inicia sesión para comprar y visualizar el informe</h6>
                                                @endif --}}

                                                {{-- <p class="card-precio"><small class="text-muted"
                                                        style="font-size:20px; font-family: 'Open Sans', sans-serif; font-size:16px;font-weight: bold;text-align: center;">Precio:
                                                        {{ number_format($producto->price, 0, ',', '.') }} COP</small>
                                                </p> --}}
                                            </div>
                                            {{--  --}}
                                            @if ($hasPurchased[$producto->id])
                                                {{-- {{ $pro->contenido }} --}}
                                                <div class="product-content" style="text-align: center;">
                                                    {{-- <button type="button" style="text-align: center; background-color:rgb(114, 255, 32); border:rgb(114, 255, 32);font-family: 'Open Sans', sans-serif;" class="btn btn-primary" data-toggle="modal" data-target="#productModal{{ $producto->id }}">
                                                Leer informe
                                            </button> --}}
                                                    <a href="{{ route('informe.mostrar', ['id' => $producto->id]) }}"
                                                        style="text-align: center; background-color:rgb(114, 255, 32); border:rgb(114, 255, 32);font-family: 'Open Sans', sans-serif;"
                                                        class="btn btn-primary">Leer informe</a>
                                                </div>
                                            @else
                                                <div class=""
                                                    style="text-align: center;font-family: 'Open Sans', sans-serif;">
                                                    <button type="button"
                                                        style="text-align: center; background-color:red;border:red;"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-target="#productModal{{ $producto->id }}">
                                                        Leer informe
                                                    </button>
                                                </div>
                                            @endif

                                            <br>
                                            <br>
                                            {{--  --}}
                                            {{-- <form action="{{ route('cart.store') }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $producto->id }}" id="id"
                                                    name="id">
                                                <input type="hidden" value="{{ $producto->name }}" id="name"
                                                    name="name">
                                                <input type="hidden" value="{{ $producto->minPrice }}" id="price"
                                                    name="price">
                                                    <input type="hidden" value="{{ $producto->maxPrice }}" id="price"
                                                    name="price">
                                                <input type="hidden" value="{{ $producto->image_path }}"
                                                    id="img" name="img">
                                                <input type="hidden" value="1" id="quantity" name="quantity">
                                                <div class="card-footer" style="background-color: white;">
                                                    <div class="row">
                                                        @if (Auth::check())
                                                            @if ($hasPurchased[$producto->id])
                                                            @else
                                                                <button class="btn btn-secondary btn-sm"
                                                                    class="tooltip-test" title="add to cart">
                                                                    <h6
                                                                        style="font-size: 17px; font-family: 'Open Sans', sans-serif;">
                                                                        <i class="fa fa-shopping-cart"
                                                                            style="margin-right: 5px;"></i> Agregar al
                                                                        carrito
                                                                    </h6>
                                                                </button>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </form> --}}
                                            <form action="{{ route('cart.store') }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $producto->id }}" id="id" name="id">
                                                <input type="hidden" value="{{ $producto->name }}" id="name"
                                                    name="name">
                                                @if (Auth::check())
                                                    @if ($user->cliente->activos > $constantAssets)
                                                        <input type="hidden" value="{{ $producto->maxPrice }}" id="price"
                                                            name="price">
                                                    @else
                                                        <input type="hidden" value="{{ $producto->minPrice }}" id="price"
                                                            name="price">
                                                    @endif
                                                @endif
                                                <input type="hidden" value="{{ $producto->image_path }}" id="img"
                                                    name="img">
                                                <input type="hidden" value="1" id="quantity" name="quantity">
                                                <div class="card-footer" style="background-color: white;">
                                                    <div class="row">
                                                        @if (Auth::check())
                                                            @if ($hasPurchased[$producto->id])
                                                                <!-- Agregar lógica específica si el producto especial se ha comprado -->
                                                            @else
                                                                <button class="btn btn-secondary btn-sm" class="tooltip-test"
                                                                    title="add to cart">
                                                                    <i class="fa fa-shopping-cart"></i> agregar al carrito
                                                                </button>
                                                            @endif
                                                        @endif
                    
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal para detalles del producto -->
                                <div class="modal fade" id="productModal{{ $producto->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="productModalLabel{{ $producto->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header ">
                                                <h5 class="modal-title" id="productModalLabel{{ $producto->id }}">
                                                    @if ($hasPurchased[$producto->id])
                                                        {{-- {{ $pro->contenido }} --}}
                                                        <div class="product-content">
                                                            {!! $producto->contenido !!}
                                                        </div>
                                                    @else
                                                        <div style="font-family: 'Open Sans', sans-serif;">
                                                            PARA ACCEDER A ESTA INFORMACIÓN DEBES COMPRAR EL INFORME
                                                        </div>
                                                    @endif
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
            </div>
        </div>
    </div>

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
