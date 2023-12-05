<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Producto | Analítica Solidaria</title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <br>
    <br>

    <div class="container">
        <h1>Editar Producto</h1>

        <form method="POST" action="{{ route('admin.actualizar-producto', ['id' => $producto->id]) }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Nombre del Producto:</label>
                <input type="text" name="name" class="form-control" value="{{ $producto->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" class="form-control" required>{{ $producto->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="minPrice">Precio bajo:</label>
                <input type="number" name="minPrice" class="form-control" value="{{ $producto->minPrice }}" required>
            </div>
            <div class="form-group">
                <label for="maxPrice">Precio alto:</label>
                <input type="number" name="maxPrice" class="form-control" value="{{ $producto->maxPrice }}" required>
            </div>
            <div class="form-group">
                <label for="contenido">Contenido oculto:</label>
                <input type="text" name="contenido" class="form-control" value="{{ $producto->contenido }}" required>
            </div>
            <div class="form-group">
                <label for="image_path">Imagen actual:</label>
                <img src="{{ asset($producto->image_path) }}" alt="{{ $producto->name }}" width="150">
            </div>
            <div class="form-group">
                <label for="new_image">Nueva imagen:</label>
                <input type="file" name="new_image" class="form-control-file">
            </div>
            
            
            <!-- Agregar otros campos para editar según sea necesario -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
<br>
    <br>
    @include('footer.footer')
</body>
</html>
