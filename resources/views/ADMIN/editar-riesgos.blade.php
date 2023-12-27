<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar vista riesgos | Analítica Solidaria</title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')
    @extends('app')

    <br>
    <br>

    <div class="container">
        <h1>Editar vista riesgos</h1>

        <form method="POST" action="{{ route('admin.actualizar-riesgos', ['id' => $riesgos->id]) }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="texto_riesgos">Texto:</label>
                <textarea class="ckeditor" type="text" name="texto_riesgos" class="form-control" value="{{ $riesgos->texto_riesgos }}" required></textarea>
            </div>
            <div class="form-group">
                <label for="image_riesgos">Imagen actual:</label>
                <img src="{{ asset($riesgos->image_riesgos) }}" alt="{{ $riesgos->image_riesgos }}" width="150">
            </div>
            <div class="form-group">
                <h6 class="fas fa">  1000 x 500px(Ancho x Alto) </h6>
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
