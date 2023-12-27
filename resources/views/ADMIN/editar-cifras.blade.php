<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar vista cifras | Analítica Solidaria</title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')
    @extends('app')

    <br>
    <br>

    <div class="container">
        <h1>Editar vista cifras generales</h1>

        <form method="POST" action="{{ route('admin.actualizar-cifras', ['id' => $cifras->id]) }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="texto_cifras">Texto:</label>
                <textarea class="ckeditor" type="text" name="texto_cifras" class="form-control" value="{{ $cifras->texto_cifras }}" required></textarea>
            </div>
            <div class="form-group">
                <label for="image_cifras">Imagen actual:</label>
                <img src="{{ asset($cifras->image_cifras) }}" alt="{{ $cifras->image_cifras }}" width="150">
            </div>
            <div class="form-group">
                <h6 class="fas fa"> (Ancho x Alto) </h6>
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
