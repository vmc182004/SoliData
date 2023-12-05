<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Usuarios | Analítica Solidaria</title>
</head>
<style>
</style>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <br>
    <br>
    <br>
    
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <br>
        <form action="{{ route('users') }}" method="GET">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Buscar por nombre, correo o rol">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
<br>        
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->role }}</td>
                    <td>
                        <a href="{{ route('admin.editar-usuario', $usuario->id) }}" class="btn btn-primary">Editar</a>
                        <!-- Agregar otros botones de acciones si es necesario -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <br>
   
    <br>
    @include('footer.footer')
</body>
</html>
