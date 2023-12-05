<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar noticias | Analítica Solidaria</title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')
    @extends('app')

    <br>
    <br>

    <div class="container">
        <h1>Editar noticias</h1>

        <form method="POST" action="{{ route('admin.actualizar-noticia', ['id' => $noticia->id]) }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="titulo_noticia">Titulo:</label>
                <input type="text" name="titulo_noticia" class="form-control" value="{{ $noticia->titulo_noticia }}" required>
            </div>
            <h6 class="fas fa">Este texto aparecera en el carrusel principal </h6>
            <div class="form-group">
                <label for="texto_corto">Texto corto:</label>
                <textarea class="ckeditor" type="text" name="texto_corto" class="form-control" value="{{ $noticia->texto_corto }}" required></textarea>
            </div>
            <h6 class="fas fa">Este texto aparecera en el blog de noticias, en ver la noticia completa </h6>
            <div class="form-group">
                <label for="texto_largo">Texto completo:</label>
                <textarea class="ckeditor" type="text" name="texto_largo" class="form-control" value="{{ $noticia->texto_largo }}" required></textarea>
            </div>
            <div class="form-group">
                <label for="fecha_noticia">Fecha:</label>
                <input type="date" name="fecha_noticia" class="form-control" value="{{ $noticia->fecha_noticia }}" required>
            </div>
            <div class="form-group">
                <label for="image_noticia">Imagen actual:</label>
                <img src="{{ asset($noticia->image_noticia) }}" alt="{{ $noticia->titulo_noticia }}" width="150">
            </div>
            <div class="form-group">
                <h6 class="fas fa">350 x 200 (Ancho x Alto) </h6>
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
