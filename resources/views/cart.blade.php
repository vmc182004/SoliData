

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tu carrito | Analítica Solidaria</title>
</head>
<body>

@include('partials.navbar')
{{-- @include('partials.cab') --}}
<!--  -->
<br>
<br>
<!--  -->
    <div class="container" style="margin-top: 30px">
        <div class="col-lg-7">
            <a class="fas fa-shopping-cart" href="{{ route('cart.index') }}" style="color: #000; text-decoration: none;margin-bottom: 5px;font-size: 24px;"><span>  TU CARRITO</span></a>
        </div>
        <a class="fas fa-arrow-down" href="{{ route('cart.index') }}" style="color: #000; text-decoration: none;margin-bottom: 5px;font-size: 24px;"><span>  CONTINUA CON LA COMPRA</span></a>
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center" >
            <div class="col-lg-7" >
                <br>
                @if(\Cart::getTotalQuantity()>0)
                    <h4>{{ \Cart::getTotalQuantity()}} Producto(s) en el carrito</h4><br>
                @else
                    <h4>No hay productos en el carrito</h4><br>
                    <a href="{{route ('shop') }}" class="btn btn-dark">Continue en la tienda</a>
                @endif

                @foreach($cartCollection as $item)
                    <div class="row" style="margin-left:200px;">
                        <div class="col-lg-3" >
                            <img src="{{ asset($item->attributes->image) }}" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-lg-5">
                            <p>
                                <b><a >{{ $item->name }}</a></b><br>
                                <b>Price: </b>{{ number_format($item->price, 0, ',', '.') }} COP
                                {{-- <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br> --}}
                                {{--                                <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                        {{-- <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                               id="quantity" name="quantity" style="width: 70px; margin-right: 10px;"> --}}
                                        {{-- <button class="btn btn-secondary btn-sm" style="margin-right: 25px;"><i class="fa fa-edit"></i></button> --}}
                                    </div>
                                </form>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @if(count($cartCollection)>0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-secondary btn-md">Borrar Carrito</button> 
                    </form>
                @endif
            </div>
            @if(count($cartCollection)>0)
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() }}</li>
                        </ul>
                    </div>
                    <br><a href="{{route ('shop') }}" class="btn btn-dark">Continue en la tienda</a>
                    <a href="{{ route('pedido.proceso') }}" class="btn btn-success" style="background-color: RGB(0 130 130); border: RGB(0 130 130);">Proceder al Checkout</a>
                    <!--  -->
                    <div id="wallet_container"></div>
                    <!--  -->
                </div>
            @endif
        </div>
        <br><br>
    </div>
<br><br>
    <br>
    @include('footer.footer')

    


</body>
</html>
