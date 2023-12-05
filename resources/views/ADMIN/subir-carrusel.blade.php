<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir carrusel home | Analítica Solidaria </title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <div class="container mt-4">
        <br>
        <br>
        <h1 class="fas fa">Subir al carrusel principal</h1>
        <form method="POST" action="{{ route('admin.guardar-carrusel') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo_carrusel">Titulo:</label>
                <input type="text" name="titulo_carrusel" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="texto_carrusel">Texto:</label>
                <textarea type="text" name="texto_carrusel" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="fecha_carrusel">Fecha:</label>
                <input type="date" name="fecha_carrusel" required>
            </div>
            <div class="form-group">
                <h6 class="fas fa">1500 x 700 (Ancho x Alto) </h6>
                <label for="image">Imagen:</label>
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