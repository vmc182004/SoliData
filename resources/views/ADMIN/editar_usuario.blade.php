<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar usuarios | Analítica Solidaria</title>
</head>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <br>
    <br>

    <div class="container">
        <h1>Editar Usuario</h1>

        <form method="POST" action="{{ route('admin.actualizar-usuario', $usuario->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="role">Rol:</label>
                <select name="role" id="role" class="form-control">
                    <option value="user" {{ $usuario->role === 'user' ? 'selected' : '' }}>Usuario</option>
                    <option value="admin" {{ $usuario->role === 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

<br>
    <br>
    @include('footer.footer')
</body>
</html>
