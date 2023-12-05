<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar indicador | Analítica Solidaria</title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <br>
    <br>

    <div class="container">
        <h1>Editar indicador</h1>

        <form method="POST" action="{{ route('admin.actualizar-marquesina', ['id' => $Marquesina->id]) }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="datoIndicador">Dato:</label>
                <input type="text" name="datoIndicador" class="form-control" value="{{ $Marquesina->datoIndicador }}" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label><br>
                <input type="double" name="valor" class="form-control" value="{{ $Marquesina->valor }}" required>
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
