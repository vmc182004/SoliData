<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir iconos home | Analítica Solidaria </title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <div class="container mt-4">
        <br>
        <br>
        <h1 class="fas fa">Subir iconos principales</h1>
        <form method="POST" action="{{ route('admin.guardar-icono') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name_icono">Nombre del icono:</label>
                <input type="text" name="name_icono" class="form-control" required>
            </div>
            <div class="form-group">
                <h6 class="fas fa">300px (Ancho x Alto) </h6>
                <label for="image">Imagen:</label>
                <input type="file" name="image" class="form-control-file" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir icono</button>
        </form>
    </div>
    <br>
    <br>
    <br>
    @include('footer.footer')
</body>
</html>