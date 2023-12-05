<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar icono | Analítica Solidaria</title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <br>
    <br>

    <div class="container">
        <h1>Editar Icono</h1>

        <form method="POST" action="{{ route('admin.actualizar-icono', ['id' => $icono->id]) }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name_icono">Nombre del icono:</label>
                <input type="text" name="name_icono" class="form-control" value="{{ $icono->name_icono }}" required>
            </div>
            <div class="form-group">
                <label for="image_icono">Imagen actual:</label>
                <img src="{{ asset($icono->image_icono) }}" alt="{{ $icono->image_icono }}" width="150">
            </div>
            <div class="form-group">
                <h6 class="fas fa">300px (Ancho x Alto) </h6>
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
