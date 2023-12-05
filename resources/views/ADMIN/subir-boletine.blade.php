<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir boletin | Analítica Solidaria </title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <div class="container mt-4">
        <br>
        <br>
        <h1 class="fas fa">Subir al boletin</h1>
        <form method="POST" action="{{ route('admin.guardar-boletine') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo_boletin">Titulo:</label>
                <input type="text" name="titulo_boletin" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="texto_boletin">Texto:</label>
                <input type="text" name="texto_boletin" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombreBoton_boletin">Nombre boton:</label>
                <input type="text" name="nombreBoton_boletin" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="año_boletin">AÑO:</label>
                <input type="text" name="año_boletin" required>
            </div>
            <div class="form-group">
                <h6 class="fas fa">50px (Ancho x Alto) </h6>
                <label for="icono_boletin">Imagen icono:</label>
                <input type="file" name="icono_boletin" class="form-control-file" accept="icono_boletin/*" required>
            </div>
            <div class="form-group">
                <h6 class="fas fa"> (Ancho x Alto) </h6>
                <label for="image">Imagen fondo:</label>
                <input type="file" name="image" class="form-control-file" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir al carrusel</button>
        </form>
    </div>
    <br>
    <br>
    <br>
    @include('footer.footer')
</body>
</html>