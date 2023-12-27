<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver riesgos | Analítica Solidaria</title>
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
    @extends('app')

    <br>
    <br>
    <br>
    <div class="container">
        <h1 class="fas fa">Lista riesgos</h1>
        <br>
        <br>
        
<div class="fas fa" style="margin-left: 800px;">
    <a href="{{ route('admin.subir-riesgos') }}" class="btn btn-primary">Subir</a>
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
        <table class="table">
            <thead>
                <tr>
                    <th>Texto </th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($riesgos as $riesgos)
                <tr>
                    <td>{!! $riesgos->texto_riesgos !!}</td>
                    <td><img src="{{ asset($riesgos->image_riesgos) }}" style="width: 50px; height: 50px;"></td>
                    <td>
                        <a href="{{ route('admin.editar-riesgos', ['id' => $riesgos->id]) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.eliminar-riesgos', ['id' => $riesgos->id])}}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar?')">Eliminar</button>
                        </form>
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
