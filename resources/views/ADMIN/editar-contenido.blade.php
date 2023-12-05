<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar contenido | Analítica Solidaria</title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <br>
    <br>

    <div class="container">
        <h1>Editar contenido</h1>

        <form method="POST" action="{{ route('admin.actualizar-contenido', ['id' => $contenido->id]) }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="titulo_contenido">Titulo:</label>
                <input type="text" name="titulo_contenido" class="form-control" value="{{ $contenido->titulo_contenido }}" required>
            </div>
            <div class="form-group">
                <label for="texto_contenido">Texto:</label>
                <textarea type="text" name="texto_contenido" class="form-control" value="{{ $contenido->texto_contenido }}" required></textarea>
            </div>
            <div class="form-group">
                <label for="name_boton">Nombre del boton:</label>
                <input type="text" name="name_boton" class="form-control" value="{{ $contenido->name_boton }}" required>
            </div>
            <div class="form-group">
                <label for="image_contenido">Imagen actual:</label>
                <img src="{{ asset($contenido->image_contenido) }}" alt="{{ $contenido->titulo_contenido }}" width="150">
            </div>
            <div class="form-group">
                <label for="new_image">Nueva imagen:</label>
                <h6 class="fas fa">500 x 500 (Ancho x Alto) </h6>
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
