<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver empresas | Analítica Solidaria</title>
</head>
<style>
    .alert-danger {
    background-color: #ff6666; /* Cambia el color de fondo a rojo */
    color: white; /* Cambia el color del texto a blanco o cualquier otro color deseado */
    padding: 10px; /* Añade espacio alrededor del mensaje */
    border-radius: 5px; /* Agrega bordes redondeados */
    margin-bottom: 10px; /* Espacio entre mensajes si hay varios */
}

    </style>
<body>
    @include('partials.navbar')
    @include('partials.navHori')

    <br>
    <br>
    <br>
    <div class="container">
        <h1 class="fas fa">Lista de empresas</h1>
        <br>
        <br>

<div class="fas fa" style="margin-left: 800px;">
    <a href="{{ route('admin.subir-cliente') }}" class="btn btn-primary">Subir empresa</a>
</div>
<br>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<br>
<br>
<form action="{{ route('cliente.mostrar') }}" method="GET">
    <input type="text" name="search" placeholder="Buscar por NIT o Sigla" value="{{ $search ?? '' }}">
    <button type="submit">Buscar</button>
</form>
<br>
<table class="table">
    <thead>
        <tr>
            <th>Nombre Empresa</th>
            {{-- <th>NIT</th> --}}
            {{-- <th>Correo</th> --}}
            <th>Activos</th>
            <th>Id segmentacion</th>
            <th>nombre segmentacion</th>
            <th>Id entidad</th>
            <th>nombre entidad</th>
            {{-- <th>Acciones</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nameEmpresa }}</td>
            {{-- <td>{{$cliente->nitEmpresa}}</td> --}}
            <td>{{number_format($cliente->activos, 0, ',', '.') }}</td>
            <td>{{$cliente->segmentacion_id}}</td>
            <td>{{$cliente->segmentacion->nameSegmentacion}}</td>
            <td>{{$cliente->segmentacion->tipo_entidad_id}}</td>
            <td>{{$cliente->segmentacion->tipoentidad->nameEntidad}}</td>
            {{-- <td>{{$cliente->emailEmpresa}}</td> --}}



            {{-- <td>
                <a href="{{ route('admin.editar-cliente', ['id' => $cliente->id]) }}" class="btn btn-primary">Editar</a>
            </td> --}}
            {{-- <td>
                <form method="POST" action="{{ route('admin.eliminar-cliente', ['id' => $cliente->id])}}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar ?')">Eliminar</button>
                </form>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
        <!-- Tu código HTML anterior -->
<!-- ... -->

<div class="d-flex justify-content-center">
    {{ $clientes->links('pagination::simple-bootstrap-4') }}
</div>


<!-- Tu código HTML posterior -->

    </div>
<br>
    <br>
    @include('footer.footer')
</body>
</html>
