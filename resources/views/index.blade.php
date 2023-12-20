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

        
        /* ICONOS INDEX------------------------------------------------ */
        #prinicon{
            max-width: 75%; 
            margin: 0 auto;
            margin-bottom: 4%;
        }
        #twoicon{
            padding-left: 10px;
        }
        #icontainer{
            background-color: #ececec; 
            padding: 20px; 
            border-radius: 5px;
            width:280px;
            display: flex;
            justify-content: center;
            text-align: center;
            align-items: center;
        }
        #imgicons{
            height: 80px;
            width: 90px; 
            margin-bottom: 20px;
            
        }
        #buticons{
            background-color: #012060; 
            border-color: #008282;
            width:280px;border:none;
        }
        #spanicons{
            color: white;
            font-family: 'GlacialIndifference-Bold', sans-serif;
        }
        /* CONTENIDO INDEX -----------------------------------------------------------*/
    #fascont{
        color:#012060;
        text-decoration: none;
        font-size: 40px;
        margin-bottom: 3%;
        font-family: 'GlacialIndifference-Bold', sans-serif;
    }
    #atwo{
        background-color:#012060;
        font-family: 'GlacialIndifference-Bold', sans-serif;
    }
    #btnNosotros {
            margin-top: 20px;
            margin-left: 5%;
        }
    h5{
        color: #2175aa;
        text-align: start;
        font-family: 'GlacialIndifference-Bold', sans-serif;
        margin-bottom: 27%;
    }
    .mt-4{
        margin-bottom: 4%;
    }
    #imgconte{
        margin-left: 30%;
        margin-top: 3%
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
    <div class="container mt-4 text-center" id="prinicon" >
        <div class="row" id="twoicon">
            @foreach ($iconos as $icono)
                <div class="col-md-3 mb-3">
                    <div class="icon-container" id="icontainer">
                        <!-- Coloca la imagen dinámica -->
                        <img src="{{ asset($icono->image_icono) }}" alt="{{ $icono->name_icono }}" class="img-fluid" id="imgicons">
                    </div>
                    <a class="btn btn-custom-color btn-block" id="buticons">
                        <span id="spanicons">{{ $icono->name_icono }}</span>
                    </a>
                </div>
            @endforeach
        </div>
     </div>
    <!-- contenido -->
    <div class="container mt-4">
        <div class="row">
            @foreach ($contenido as $contenido)
                <div class="col-md-6">
                    <img src="{{ asset($contenido->image_contenido) }}" alt="{{ $contenido->titulo_contenido }}" class="img-fluid" id="imgconte" alt="Imagen">
                </div>
                <div class="col-md-6" id="text">
                    <a class="fas fa" id="fascont" href="#">{{ $contenido->titulo_contenido }}</a>
                    <h5>{{ $contenido->texto_contenido }}</h5>
                    <a href="#" id="atwo" class="btn btn-primary btn-lg btn-block"><i class="fas fa-arrow-right"></i>{{ $contenido->name_boton }}</a>
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
