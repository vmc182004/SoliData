<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir empresa | Analítica Solidaria </title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <div class="container mt-4">
        <br>
        <br>
        <h1 class="fas fa">Subir empresa</h1>
        <form method="POST" action="{{ route('admin.guardar-cliente') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nameEmpresa">Nombre empresa:</label>
                <input type="text" name="nameEmpresa" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nitEmpresa">NIT:</label><br>
                <input type="text" name="nitEmpresa" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="emailEmpresa">Email empresa:</label>
                <input type="text" name="emailEmpresa" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="activos">Activos:</label><br>
                <h6>CANTIDAD SIN PUNTOS NI COMAS</h6>
                <input type="decimal" name="activos" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="segmentacion_id">id fk:</label>
                <input type="text" name="segmentacion_id" class="form-control" required>
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