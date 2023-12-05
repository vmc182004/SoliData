<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>boletin | Analítica Solidaria</title>
    <!-- Agrega la referencia a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
     .image {
            max-width: 100%; /* Asegura que la imagen no se desborde */
        }

        /* Estilo para el texto que se superpone a la imagen */
        .text-overlay {
            position: absolute;
            top: 50px; /* Ajusta la posición vertical del texto */
            left: 10px; /* Ajusta la posición horizontal del texto */
            width: 730px;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semitransparente para el texto */
            padding: 10px; /* Espacio interno del texto */
            border: 1px solid rgba(255, 255, 255, 0.8); /* Borde alrededor del texto */
        }

        .text-overla {
            position: absolute;
            top: -50px; /* Ajusta la posición vertical del texto */
            left: 10px; /* Ajusta la posición horizontal del texto */
            width: 730px;
            padding: 10px; /* Espacio interno del texto */
        }
        </style>

</head>
<body>
     <!-- CABECERA -->
    
     @include('partials.navbar')
    
    <!-- -->
    <br>
    <br>
    <div class="col-md-6 mt-0 ">
        <!-- Contenedor de la imagen y el texto -->
        <div class="image-container">
            <img src="{{ asset('img/image34.png') }}" style="margin-left: 180px;" class="image" alt="Imagen">
            <!-- Texto que se superpone a la imagen -->
            <div class="text-overla" style="margin-left: 1100px; margin-top: 100px; font-size: 60px">
            <img src="{{ asset('img\image34.png') }}" alt="Icono 2" class="img-fluid" style="width: 80px;"><br>
            </div>

            <div class="text-overlay" style="margin-left: 600px; margin-top: 100px; font-size: 40px">
                <a class="fas fa" style="color: #000;text-decoration: none;" href="{{ route('cifras') }}"><span> SUBSCRIBETE AL BOLETIN</span></a>
            </div>
        </div>
    </div>
<br>
<br>
    <!-- CONTACTO -->
<a class="fas fa" style="color: RGB(0 130 130); border: RGB(0 130 130);font-size:30px;text-decoration: none;margin-left: 200px;" href="{{ route('boletin') }}"><span> Dejanos tus datos</span></a>
<br>
<br>
<!-- formulario -->

<div class="container">
    <div class="row">
        <!-- Columna del formulario -->
        <div class="col-md-6">
            <form method="POST" action="{{ route('validar-boletin') }}">

        @csrf
        <div class="fas fa mb-3">
            <label for="userInput" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="userInput" name="nombre" required autocomplete="disable">
        </div>
        <div class="fas fa mb-3">
            <label for="emailInput" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailInput" name="emailB" required autocomplete="disable">
        </div>
        <button type="submit" class="fas fa btn btn-primary" style="margin-left: 85%; background-color: RGB(0 130 130); border: RGB(0 130 130);"><b>ENVIAR</b></button>
    </form>

        </div>

        
    </div>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<br>
<br>
<!-- FOOTER -->
    @include('footer.footer')


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>