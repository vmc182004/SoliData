<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver segmentaciones | Analítica Solidaria</title>
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
        <h1 class="fas fa">Lista de segmentaciones</h1>
        <br>
        <br>
        

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
                    <th>ID</th>
                    <th>Nombre segmentacion </th>
                    <th>Mayor que</th>
                    <th>Menor que</th>
                    <th>Tipo de entidad id</th>
                    <th>Nombre entidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($segmentacion as $segmentacion)
                <tr>
                    <td>{{$segmentacion->id}}</td>
                    <td>{{$segmentacion->nameSegmentacion}}</td>
                    <td>{{$segmentacion->mayor}}</td>
                    <td>{{$segmentacion->menor}}</td>
                    <td>{{$segmentacion->tipo_entidad_id}}</td>
                    <td>{{$segmentacion->tipoentidad->nameEntidad}}</td>

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
