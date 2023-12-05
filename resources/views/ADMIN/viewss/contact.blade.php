<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver contactos | Analítica Solidaria</title>
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
        <h1 class="fas fa">Lista de personas a contactar</h1>
        <br>
        <br>
        <form action="{{ route('contact') }}" method="GET">
            @csrf
            <div class="input-group">
                <input type="date" class="form-control" name="fecha_busqueda" placeholder="Buscar por fecha">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" style="background-color:RGB(0 130 130); border:RGB(0 130 130);">Buscar por Fecha</button>
                </div>
            </div>
        </form>
        
<br>
<br>
<br>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Fecha de nacimiento</th>  
                    <th>Tipo de documento</th>                 
                    <th>Número de documento</th>
                    <th>Celular</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacto as $contacto)
                <tr>
                    <td>{{ $contacto->name }}</td>
                    <td>{{ $contacto->apellidos }}</td>
                    <td>{{ $contacto->email }}</td>
                    <td>{{ $contacto->fecha_nacimiento }}</td>
                    <td>{{ $contacto->tipo_documento }}</td>
                    <td>{{ $contacto->numero_documento }}</td>
                    <td>{{ $contacto->celular }}</td>
                    <td>{{ $contacto->created_at }}</td>
                </tr>
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
