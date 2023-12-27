<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir vista cifras | Analítica Solidaria </title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')
    @extends('app')
    <div class="container mt-4">
        <br>
        <br>
        <h1 class="fas fa">Subir vista cifras</h1>
        <form method="POST" action="{{ route('admin.guardar-cifras') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="texto_cifras">Texto:</label>
                <textarea class="ckeditor" type="text" name="texto_cifras" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <h6 class="fas fa"> 1000 x 500px (Ancho x Alto) </h6>
                <label for="image">Imagen:</label>
                <input type="file" name="image" class="form-control-file" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir</button>
        </form>
    </div>
    <br>
    <br>
    <br>
  

    @include('footer.footer')
</body>
</html>