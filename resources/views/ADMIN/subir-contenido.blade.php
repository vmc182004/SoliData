<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir contenido home | Analítica Solidaria </title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <div class="container mt-4">
        <br>
        <br>
        <h1 class="fas fa">Subir contenido principal</h1>
        <form method="POST" action="{{ route('admin.guardar-contenido') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo_contenido">Titulo:</label>
                <input type="text" name="titulo_contenido" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="texto_contenido">Texto:</label>
                <textarea type="text" name="texto_contenido" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="name_boton">Nombre del botón:</label>
                <input type="text" name="name_boton" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Imagen:</label>
                <h6 class="fas fa">500 x 500 (Ancho x Alto) </h6>
                <input type="file" name="image" class="form-control-file" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir contenido</button>
        </form>
    </div>
    <br>
    <br>
    <br>
    @include('footer.footer')
</body>
</html>