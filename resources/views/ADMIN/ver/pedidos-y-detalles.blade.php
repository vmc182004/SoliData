<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos | Analítica Solidaria</title>
</head>
<style>
    .search-container {
    margin-left: 400px;
    width: 350px;
}

.input-group {
    display: flex;
}

.form-control {
    width: 70%; /* Ajusta el ancho según tus preferencias */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn {
    background-color: #ffffff; /* Color de fondo del botón */
    color: #fff; /* Color del texto del botón */
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Estilos adicionales para resaltar el botón al pasar el mouse */
.btn:hover {
    background-color: #ffffff; /* Cambiar color de fondo en el hover */
}

</style>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <br>
    <br>
    <br>
    <h1 class="fas fa" style="margin-left: 400px;">Pedidos y Detalles</h1>
    
    <div class="fas fa" style="margin-left: 200px;">
        <p>Cantidad de ventas HOY: {{ $cantidadPedidosDelDia }}</p>
        <p>Suma de ventas del día: ${{ $ventasDelDia }}</p>
        <p>Cantidad de ventas totales: {{ $cantidadPedidosAcumulados }}</p>
        <p>Suma de ventas acumulados: ${{ $ventasAcumuladas }}</p>
    </div>
    <div class="search-container">
        <form action="{{ route('admin.pedidos-y-detalles') }}" method="GET">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Buscar por nombre de Usuario">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" style="background-color: #008282;border:#008282;">Buscar</button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <br>
        <table class="table" style="margin-left: 200px;">
            <thead>
                <tr>
                    <th>ID de Usuario</th>
                    <th>Nombre de Usuario</th>
                    <th>Correo</th>
                    <th>Codigo Pedido</th>
                    <th>Detalles</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->usuario->id }}</td>
                        <td>{{ $pedido->usuario->name }}</td>
                        <td><a href='mailto:{{ $pedido->usuario->email}}'></a></td>
                        {{-- <td>{{ $pedido->usuario->email}}</td> --}}
                        <td>{{ $pedido->codigo }}</td>
                        <td>
                            <table>
                                @foreach($pedido->detalles as $detalle)
                                    <tr>
                                        <td>{{ $detalle->producto }}</td>
                                        {{-- <td>{{ $detalle->cantidad }}</td> --}}
                                        <td>{{ $detalle->precio }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<br>
    <br>
    @include('footer.footer')
</body>
</html>
