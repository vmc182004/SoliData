<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar carrusel | Analítica Solidaria</title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <br>
    <br>

    <div class="container">
        <h1>Editar carrusel</h1>

        <form method="POST" action="{{ route('admin.actualizar-carrusel', ['id' => $carrusel->id]) }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="titulo_carrusel">Titulo:</label>
                <input type="text" name="titulo_carrusel" class="form-control" value="{{ $carrusel->titulo_carrusel }}" required>
            </div>
            <div class="form-group">
                <label for="texto_carrusel">Texto:</label>
                <textarea type="text" name="texto_carrusel" class="form-control" value="{{ $carrusel->texto_carrusel }}" required></textarea>
            </div>
            <div class="form-group">
                <label for="fecha_carrusel">Fecha:</label>
                <input type="date" name="fecha_carrusel" class="form-control" value="{{ $carrusel->fecha_carrusel }}" required>
            </div>
            <div class="form-group">
                <label for="image_carrusel">Imagen actual:</label>
                <img src="{{ asset($carrusel->image_carrusel) }}" alt="{{ $carrusel->titulo_carrusel}}" width="150">
            </div>
            <div class="form-group">
                <h6 class="fas fa">1500 x 700 (Ancho x Alto) </h6>
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
