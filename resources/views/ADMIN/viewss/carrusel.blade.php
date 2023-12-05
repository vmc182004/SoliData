<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver carrusel | Analítica Solidaria</title>
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
        <h1 class="fas fa">Lista del carrusel</h1>
        <br>
        <br>
        
<div class="fas fa" style="margin-left: 800px;">
    <a href="{{ route('admin.subir-carrusel') }}" class="btn btn-primary">Subir al carrusel</a>
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
                    <th>Titulo</th>
                    <th>Texto</th>
                    <th>Fecha carrusel</th>                   
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrusel as $carrusel)
                <tr>
                    <td>{{ $carrusel->titulo_carrusel }}</td>
                    <td>{{ $carrusel->texto_carrusel }}</td>
                    <td>{{ $carrusel->fecha_carrusel }}</td>
                    <td><img src="{{ asset($carrusel->image_carrusel) }}" style="width: 50px; height: 50px;"></td>
                    <td>
                        <a href="{{ route('admin.editar-carrusel', ['id' => $carrusel->id]) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.eliminar-carrusel', ['id' => $carrusel->id])}}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar ?')">Eliminar</button>
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
