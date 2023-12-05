<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar boletin | Analítica Solidaria</title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <br>
    <br>

    <div class="container">
        <h1>Editar boletin</h1>

        <form method="POST" action="{{ route('admin.actualizar-boletine', ['id' => $boletine->id]) }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="titulo_boletin">Titulo:</label>
                <input type="text" name="titulo_boletin" class="form-control" value="{{ $boletine->titulo_boletin }}" required>
            </div>
            <div class="form-group">
                <label for="texto_boletin">Texto:</label>
                <input type="text" name="texto_boletin" class="form-control" value="{{ $boletine->texto_boletin }}" required>
            </div>
            <div class="form-group">
                <label for="nombreBoton_boletin">Nombre boton:</label>
                <input type="text" name="nombreBoton_boletin" class="form-control" value="{{ $boletine->nombreBoton_boletin }}" required>
            </div>
            <div class="form-group">
                <label for="año_boletin">Fecha:</label>
                <input type="text" name="año_boletin" class="form-control" value="{{ $boletine->año_boletin }}" required>
            </div>
            <div class="form-group">
                <label for="icono_boletin">Icono actual:</label>
                <img src="{{ asset($boletine->icono_boletin) }}" alt="{{ $boletine->titulo_boletin}}" width="150">
            </div>
            <div class="form-group">
                <h6 class="fas fa">50px (Ancho x Alto) </h6>
                <label for="new_image_icono">Nueva imagen:</label>
                <input type="file" name="new_image_icono" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="image_boletin">Imagen actual:</label>
                <img src="{{ asset($boletine->image_boletin) }}" alt="{{ $boletine->titulo_boletin}}" width="150">
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
