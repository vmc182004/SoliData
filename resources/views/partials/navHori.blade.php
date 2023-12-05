<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <title>CABECERA HORIZONTAL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: rgb(247, 247, 247);
        }
          #header {
            /* background-color: RGB(0 130 130); */
            background-color:RGB(0 130 130) ;
            position: absolute;
            top: 0;
            left: 230px;
            right: 0;
            z-index: 1;
            height: 70px;
            width: 80%;
            margin-left: 2%;
            margin-top: 2%;
            border-radius: 30px;
        }


        /* Espacio para compensar el desplazamiento debido a la cabecera fija */
        #header-spacer {
            height: 0px; /* Ajusta la altura según la altura de tu cabecera */
        }
        

.social-icon {
    font-size: 24px; /* Tamaño del ícono */
    color: white; /* Color del ícono (blanco) */
    margin-right: 10px; /* Espacio entre íconos (opcional) */
    text-decoration: none; /* Quita subrayado de los enlaces */
    
   
}
/* Evita que los iconos cambien de color al ser tocados (estado activo) */
.social-icon:active {
    color: white !important; /* Cambia el color al color deseado cuando se toca el icono */
}
.social-icon:focus {
    color: white !important;
}
/* persona */
/* Estilos para el botón de usuario */
.user-info a {
    font-weight: bold;
    padding: 10px;
    cursor: pointer;
}


.user-info a i {
    margin-left: 5px;
}

/* Estilos para el menú desplegable */
.user-menu ul {
    list-style: none;
    padding: 0;
}

.user-menu ul li {
    padding: 10px;
    text-align: center;
    background-color: #f8f8f8; /* Fondo del menú */
    transition: background-color 0.2s;
}

.user-menu ul li:hover {
    background-color: #e0e0e0; /* Color de fondo al pasar el mouse */
}

.user-menu ul li a {
    text-decoration: none;
    color: #333; /* Color del texto */
}

.user-menu {
    top: 100%;
    right: 0;
    width: 80px; /* Ancho del menú desplegable */
    border: 1px solid #ccc; /* Borde del menú */
    background-color: #fff; /* Fondo del menú */
    box-shadow: 0px 4px 6px rgba(255, 255, 255, 0.1); /* Sombra del menú */
    display: none;
    border-radius: 20px;
}
/* Cambia el color de la flecha en el enlace del carrito */
.nav-item.dropdown .dropdown-toggle::after {
    color: white !important; /* Cambia el color al color deseado */
}


/*-------------------- NAVBAR MODERNO------------ */
/* carrito pequeño */.navbar-expand-lg .navbar-nav .nav-link {
    padding-right: 1.0rem;
    padding-left: 0.5rem;
    font-size: 35px;
}
.badge-dark {
    color: #fff;
    background-color:RGB(0 130 130);
}
        </style>
</head>
<body>
 
<!-- Cabecera fija -->
<nav class="navbar navbar-expand-lg navbar navbar-fixed" id="header">
    <div class="container" id="header-border">
        <!-- Iconos sociales (movidos al principio) -->
        <div class="social-icons ml-0">
                <!-- Icono de Facebook -->
                <a href="#" class="social-icon" style="color: white !important; font-size:30px; padding-right: 0.8rem;"><i class="fab fa-facebook-f"></i></a>

                <!-- Icono de Twitter -->
                <a href="#" class="social-icon" style="color: white !important; font-size:30px; padding-right: 0.80rem;"><i class="fab fa-twitter"></i></a>

                <!-- Icono de Instagram -->
                <a href="{{route ('instagram') }}" class="social-icon" style="color: white !important; font-size:30px;"><i class="fab fa-instagram"></i></a>

        </div>
            <!-- Opción para administradores -->
       @if(Auth::check() && Auth::user()->role === 'admin')
       
       <ul class="navbar-nav ml-auto">
       <li class="nav-item">
            <a class="" class="nav-link" href="{{ route('admin') }}"style="color:white; font-family: 'Open Sans', sans-serif; font-weight: bold; " >ADMINISTRADOR</a>
        </li>
        </ul>
    </div>
    @else 
        <!-- Enlaces de navegación (mantenidos a la derecha) -->
        <ul class="navbar-nav ml-auto">
            {{-- ... (tu código existente) ... --}}
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle"
                   href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="badge badge-pill badge-dark">
                        <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                    </span>
                </a>
        
                <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                    <ul class="list-group" style="margin: 20px;" >
                        @include('partials.cart-drop')
                    </ul>
        
                </div>
            </li>
        </ul>
    </div>
    
    @endif
           
            

        

    <!-- SI INICIA SESIÓN -->
    @if(Auth::check())
    <div class="user-dropdown">
        <div class="user-info" id="user-toggle">
            <a>
                <i class="fas fa-user" style="color:white;"></i>
               <span style="color:white;font-family: 'Open Sans', sans-serif; font-weight: bold;"> {{ Auth::user()->name }}</span>


                <!-- <i class="fas fa-chevron-down"></i> -->
                <a class="fas fa-sign-out-alt" style="color:white;" href="{{ route('logout') }}"></a>

            </a>
        </div>
        <div class="user-menu" id="user-menu">
            <ul>
                <li><a href="{{ route('logout') }}">Salir</a></li>
                <!-- Otras opciones del menú aquí -->
            </ul>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
        
    </script>
    
    <script>
    $(document).ready(function() {
        // Oculta el menú de usuario al cargar la página
        $("#user-menu").hide();

        // Agrega un evento de clic a la flecha para mostrar/ocultar el menú
        $("#user-toggle").click(function() {
            $("#user-menu").slideToggle();
        });
    });
    </script>
    @else
        <!-- Mostrar el botón de inicio de sesión -->
        <a class=" btn btn-secondary ml-2" style="background-color:RGB(220 162 17); border:RGB(220 162 17); width: 200px; border-radius:20px;height:45px; display:flex; justify-content:center; align-items:center; font-family: 'Open Sans', sans-serif; font-weight: bold;font-size: 25px;"  href="{{ route('login') }}">INGRESAR</a>
    @endif
       
</nav>
    
</nav>
       
</body>
</html>
