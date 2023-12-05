<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    
    <title>CABECERA A LA IZQUIERDA</title>
    <style>
     /* Estilos generales */
body {
    margin: 0;
    padding: 0;
    font-family: 'Open Sans', sans-serif;
}

/* Estilos de la barra lateral */
.sidebar {
    width: 60px;
    background-color: #ffffff;
    color: #fff;
    position: fixed;
    height: 100%;
    overflow: hidden;
    transition: width 0.3s;
    z-index: 2; /* Hacer que la barra lateral esté por encima de la barra horizontal */
}

.sidebar:hover {
    width: 250px;
}

.logo {
    padding: 20px 0;
}

.logo img {
    width: 50px;
    height: 50px;
    margin-bottom: 10px;
}

/* Estilos de los íconos en la barra lateral */
.vertical-icons {
    position: fixed;
    top: 0; /* Alinea los iconos en la parte superior */
    left: 0;
    bottom: 0;
    width: 100px; /* Ancho de la barra lateral inicial */
    background-color: #ffffff;
    color: #000000; /* Color de los iconos */
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: left;
    justify-content: flex-start; /* Alinea los iconos y nombres arriba */
    padding-top: 20px; /* Espacio superior para los iconos */
    transition: width 0.3s;
}

/* Estilos de los íconos en la barra lateral cuando se agranda */
.vertical-icons:hover {
    width: 250px; /* Ancho cuando se agrande */
}

.vertical-icons i {
    font-size: 24px;
    margin-bottom: 5px;
}

.vertical-icons span {
    font-size: 0; /* Ocultar los nombres de las secciones inicialmente */
    font-family: 'Open Sans', sans-serif;

}

/* Estilos para mostrar los nombres cuando se agrande el menú */
.vertical-icons:hover span {
    font-size: 18px; /* Mostrar los nombres de las secciones cuando se agrande */
    margin-top: 5px;
}

/* Estilos del contenido principal */
.content {
    margin-left: 60px; /* Margen izquierdo para el contenido principal */
    padding: 20px;
    transition: margin-left 0.3s;
}
/* Estilos de los íconos en la barra lateral */
.vertical-icons a {
    font-size: 30px;
    margin-bottom: 5px;
    margin-left: 30px;
    color: #000; /* Cambiar el color de los íconos a negro */
    text-decoration: none; /* Eliminar la decoración de enlace (subrayado) */
}
.search-con {
    display: flex;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 5px;
    width: 200px; /* Ancho deseado */
}

.search-input {
    flex: 1;
    border: none;
    padding: 5px;
    border-radius: 5px 0 0 5px;
    outline: none;
    width: 100%; /* Llenar el ancho del contenedor */
}

.search-button {
    background-color: #008282;
    color: white;
    border: none;
    border-radius: 0 5px 5px 0;
    padding: 5px;
    cursor: pointer;
}

/* Estilos para ocultar el ícono de búsqueda inicialmente */
.custom-search-icon .search-toggle {
    display: none;
}

/* Estilos para mostrar el ícono de búsqueda cuando se agrande el menú */
.vertical-icons:hover .custom-search-icon .search-toggle {
    display: block;
}


    </style>
</head>
<body>
    <!-- Barra de navegación vertical (barra lateral) -->
  

   
 <!-- Iconos de la barra vertical -->
 <div class="vertical-icons">
        <div class="logo">
            <a><img src="{{ asset('img/logo3.png') }}" alt="Logo"></a>
        </div>
        <!-- Opción para administradores -->
       @if(Auth::check() && Auth::user()->role === 'admin')
       <br>
        <a class="fas fa-user" href="{{ route('users') }}"><span> Usuarios</span></a>
        <br>
        <a class="fas fa-home" href="{{ route('compras') }}"><span> Compras</span></a>
        <br>
        <a class="fas fa-home" href="{{ route('informe') }}"><span> Informes</span></a>
        <br>
        <a class="fas fa-home" href="{{ route('carrusel') }}"><span>Carrusel</span></a>
        <br>
        <a class="fas fa-home" href="{{ route('iconos') }}"><span>Iconos</span></a>
        <br>
        <a class="fas fa-home" href="{{ route('contenido') }}"><span> Contenido</span></a>
        <br>
        <a class="fas fa-home" href="{{ route('blogg') }}"><span> Blog</span></a>
        <br>
        <a class="fas fa-home" href="{{ route('boletine') }}"><span> Boletin</span></a>
        <br>
        <a class="fas fa-home" href="{{ route('contact') }}"><span> Contactos</span></a>
        <br>
        <a class="fas fa-home" href="{{ route('subs') }}"><span> Susbcripciones</span></a>
        <br>
        <a class="fas fa-home" href="{{ route('marquesina') }}"><span> Indicadores</span></a>
        <br>
        <a class="fas fa-home" href="{{ route('cliente') }}"><span> Empresas</span></a>


       @else
        <br>
        <br>
        <br>
        <br>
        <a class="fas fa-home" href="{{ route('index') }}"><span> Inicio</span></a>
        <br>
        {{-- <a class="custom-search-icon search-hidden" href="#">
    <i class="fas fa-search "></i> <!-- Icono de búsqueda -->
    <span class="search-toggle">
        <div class="search-con">
            <input type="text" class="search-input" placeholder="Buscar...">
            <button class="search-button">Buscar</button>
        </div>
    </span>
</a> --}}
        {{-- <br> --}}
        <a class="fas fa-file-alt" href="{{ route('shop') }}"><span> Informes o estudios</span></a>
        <br>
        <a class="fas fa-dollar-sign" href="{{ route('cifras') }}"><span> Cifras generales</span></a>
        <br>
        <a class="fas fa-chart-bar" href="{{ route('estadisticas') }}"><span> Estadisticas</span></a>
        <br>
        <a class="fas fa-coins" href="{{ route('riesgos') }}"><span> Riesgos</span></a>
        <br>
        <a class="fas fa-blog" href="{{ route('blog') }}"><span> Blog</span></a>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a class="fas fa-phone" href="{{ route('contacto') }}"><span> Contacto</span></a>
    @endif
    </div>

    <!-- Contenido principal de la página -->
    <div class="content">
        <!-- Contenido de la página va aquí -->
    </div>
   @include('partials.navHori')
   
    <!-- Scripts, estilos y otros elementos que pertenezcan al final del body -->
</body>
</html>





    </div>

    <!-- Contenido principal de la página -->
    <div class="content">
        <!-- Contenido de la página va aquí -->
    </div>
   @include('partials.navHori')
   
    <!-- Scripts, estilos y otros elementos que pertenezcan al final del body -->
</body>
</html>


