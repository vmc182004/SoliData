<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver entidades | Analítica Solidaria</title>
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
        <h1 class="fas fa">Lista de entidades</h1>
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
                    <th>id</th>
                    <th>Nombre entidad </th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipoEntidad as $tipoEntidad)
                <tr>
                    <td>{{$tipoEntidad->id}}</td>
                    <td>{{$tipoEntidad->nameEntidad}}</td>               

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
