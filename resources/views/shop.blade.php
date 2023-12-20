<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <title>Informes o estudios | Analítica Solidaria</title>

    <style>
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
            height: 300px;
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
    @include('partials.navbar')


    <div class="container" style="margin-top: 30px ">
        <div class="row justify-content-center">
            <div class="col-lg-15">
                <div class="row">
                    <div class="col-lg-7">

                    </div>
                </div>

                <!-- Productos -->
                <div class="mt-5">
                    <h1
                        style="text-align: center; color: RGB(0, 130, 130); border: RGB(0, 130, 130); font-family: 'Open Sans', sans-serif; font-weight: bold;">
                        INFORMES O ESTUDIOS</h1>
                </div>
                <br>
                <br>

                <div class="row">
                    <!--  -->
                    <div class="container">

                        <div class="justify-content-center">
                            <div class="row">
                                @foreach ($newProductos as $newProduct)
                                    @if ($newProduct['id'] == 1)
                                        <div class="col-lg-4">
                                            <div class="card special-product-card"
                                                style="border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-top-right-radius: 30px;border-top-left-radius: 30px;">
                                                <img src="{{ asset($newProduct['image_path']) }}"
                                                    alt="{{ $newProduct['name'] }}" class="card-img-top mx-auto"
                                                    style="height: 300px; width: 100%; display: block;"
                                                    alt="{{ $newProduct['image_path'] }}">
                                                <div class="card-body">
                                                    <h6 class="card-title">
                                                        {{ $newProduct['name'] }}
                                                    </h6>
                                                    @if (Auth::check())
                                                        <p class="card-precio">
                                                            <small class="text-muted"
                                                                style="font-size:20px; font-family: 'Open Sans', sans-serif; font-size:16px;font-weight: bold;text-align: center;">
                                                                Precio:
                                                                {{ number_format($newProduct['price'], 0, ',', '.') }}
                                                                COP
                                                            </small>
                                                        </p>
                                                    @else
                                                        <h6>Inicia sesión para comprar y visualizar el informe</h6>
                                                    @endif
                                                    {{-- <p class="card-precio">{{ number_format($newProduct['price, 0, ',', '.') }} COP</p> --}}
                                                    <!-- Agregar botón "Ver detalles" que abrirá el modal -->
                                                    @if ($hasPurchased[$newProduct['id']])
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
                                                        <input type="hidden" value="{{ $newProduct['id'] }}"
                                                            id="id" name="id">
                                                        <input type="hidden" value="{{ $newProduct['name'] }}"
                                                            id="name" name="name">
                                                        @if (Auth::check())
                                                            <input type="hidden" value="{{ $newProduct['price'] }}"
                                                                id="price" name="price">
                                                        @endif
                                                        <input type="hidden" value="{{ $newProduct['image_path'] }}"
                                                            id="img" name="img">
                                                        <input type="hidden" value="1" id="quantity"
                                                            name="quantity">
                                                        <div class="card-footer" style="background-color: white;">
                                                            <div class="row">
                                                                @if (Auth::check())
                                                                    @if ($hasPurchased[$newProduct['id']])
                                                                        <!-- Agregar lógica específica si el producto especial se ha comprado -->
                                                                    @else
                                                                        <button class="btn btn-secondary btn-sm"
                                                                            class="tooltip-test" title="add to cart">
                                                                            <i class="fa fa-shopping-cart"></i> agregar
                                                                            al carrito
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
                                    @if ($newProduct['id'] != 1)
                                        <div class="col-lg-4">
                                            <div class="card mb-3" style="border-radius: 30px;">
                                                <img src="{{ asset($newProduct['image_path']) }}"
                                                    alt="{{ $newProduct['name'] }}"
                                                    style=" height: 250px; width: 100%; border-top-left-radius: 30px; border-top-right-radius: 30px; border-bottom-left-radius: 0; border-bottom-right-radius: 0; ">

                                                <div class="card-body">
                                                    <h5 class="card-title"
                                                        style="color: #008282; text-align: center;font-family: 'Open Sans', sans-serif; font-size:22px;font-weight: bold;">
                                                        {{ $newProduct['name'] }}
                                                    </h5>
                                                    <div class="card-text-container">
                                                        <p class="card-text"
                                                            style="font-size:17px; font-family: 'Open Sans', sans-serif;font-weight: bold;">
                                                            {{ $newProduct['description'] }}</p>
                                                        @if (Auth::check())
                                                            <p class="card-precio">
                                                                <small class="text-muted"
                                                                    style="font-size:20px; font-family: 'Open Sans', sans-serif; font-size:16px;font-weight: bold;text-align: center;">
                                                                    Precio:
                                                                    {{ number_format($newProduct['price'], 0, ',', '.') }}
                                                                    COP
                                                                </small>
                                                            </p>
                                                        @else
                                                            <h6>Inicia sesión para comprar y visualizar el informe</h6>
                                                        @endif
                                                    </div>

                                                    @if ($hasPurchased[$newProduct['id']])
                                                        <div class="product-content" style="text-align: center;">
                                                            <a href="{{ route('informe.mostrar', ['id' => $newProduct['id']]) }}"
                                                                style="text-align: center; background-color:rgb(114, 255, 32); border:rgb(114, 255, 32);font-family: 'Open Sans', sans-serif;"
                                                                class="btn btn-primary">Leer informe</a>
                                                        </div>
                                                    @else
                                                        <div class=""
                                                            style="text-align: center;font-family: 'Open Sans', sans-serif;">
                                                            <button type="button"
                                                                style="text-align: center; background-color:red;border:red;"
                                                                class="btn btn-primary" data-toggle="modal"
                                                                data-target="#productModal{{ $newProduct['id'] }}">
                                                                Leer informe
                                                            </button>
                                                        </div>
                                                    @endif

                                                    <br>
                                                    <br>
                                                    <form action="{{ route('cart.store') }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" value="{{ $newProduct['id'] }}"
                                                            id="id" name="id">
                                                        <input type="hidden" value="{{ $newProduct['name'] }}"
                                                            id="name" name="name">
                                                        <input type="hidden" value="{{ $newProduct['price'] }}"
                                                            id="price" name="price">
                                                        <input type="hidden" value="{{ $newProduct['image_path'] }}"
                                                            id="img" name="img">
                                                        <input type="hidden" value="1" id="quantity"
                                                            name="quantity">
                                                        <div class="card-footer" style="background-color: white;">
                                                            <div class="row">
                                                                @if (Auth::check())
                                                                    @if ($hasPurchased[$newProduct['id']])
                                                                        <!-- Agregar lógica específica si el producto especial se ha comprado -->
                                                                    @else
                                                                        <button class="btn btn-secondary btn-sm"
                                                                            class="tooltip-test" title="add to cart">
                                                                            <i class="fa fa-shopping-cart"></i> agregar
                                                                            al carrito
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
                                        <div class="modal fade" id="productModal{{ $newProduct['id'] }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="productModalLabel{{ $newProduct['id'] }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content ">
                                                    <div class="modal-header ">
                                                        <h5 class="modal-title"
                                                            id="productModalLabel{{ $newProduct['id'] }}">
                                                            @if ($hasPurchased[$newProduct['id']])
                                                                {{-- {{ $pro->contenido }} --}}
                                                                <div class="product-content">
                                                                    {!! $newProduct['contenido'] !!}
                                                                </div>
                                                            @else
                                                                <div style="font-family: 'Open Sans', sans-serif;">
                                                                    PARA ACCEDER A ESTA INFORMACIÓN DEBES COMPRAR EL
                                                                    INFORME
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
            </div>
        </div>
    </div>

    <br>
    @include('footer.footer')
</body>

</html>
