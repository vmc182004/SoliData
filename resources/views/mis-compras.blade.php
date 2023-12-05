<div class="container" style="margin-top: 30px">
    <h1>Tus Compras</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Fecha de Compra</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compras as $compra)
                <tr>
                    <td>{{ $compra->producto->name }}</td>
                    <td>{{ $compra->cantidad }}</td>
                    <td>${{ number_format($compra->precio, 0, ',', '.') }}</td>
                    <td>{{ $compra->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>