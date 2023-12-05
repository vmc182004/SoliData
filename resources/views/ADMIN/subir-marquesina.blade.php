<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir indicador | Analítica Solidaria </title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <div class="container mt-4">
        <br>
        <br>
        <h1 class="fas fa">Subir a la marquesina</h1>
        <form method="POST" action="{{ route('admin.guardar-marquesina') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="datoIndicador">Dato:</label>
                <input type="text" name="datoIndicador" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label><br>
                <input type="double" name="valor" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Subir a la marquesina</button>
        </form>
    </div>
    <br>
    <br>
    <br>
    @include('footer.footer')
</body>
</html>