<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir informe | Analítica Solidaria </title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <div class="container mt-4">
        <br>
        <br>
        <h1 class="fas fa">Subir informe</h1>
        <form method="POST" action="{{ route('admin.guardar-producto') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nombre del informe:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="contenido">CONTENIDO OCULTO</label><br>
                <h6 class="fas fa">IFRAME QUE SE DESBLOQUEA AL PAGAR </h6>
                <textarea type="text" name="contenido" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="minPrice">Precio bajo COP:</label><br>
                <h6 class="fas fa">SIN PUNTOS NI COMAS </h6>
                <input type="number" name="minPrice" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="maxPrice">Precio alto COP:</label><br>
                <h6 class="fas fa">SIN PUNTOS NI COMAS </h6>
                <input type="number" name="maxPrice" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Imagen:</label>
                <input type="file" name="image" class="form-control-file" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir Producto</button>
        </form>
    </div>
    <br>
    <br>
    <br>
    @include('footer.footer')
</body>
</html>