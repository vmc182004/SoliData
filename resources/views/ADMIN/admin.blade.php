<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administrador | Analítica Solidaria</title>
    <!-- Agrega la referencia a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   

</head>
<body>
    <!-- CABECERA -->
 @include('partials.navbar')
<br>
<br>
<br>
<br>
<br>
    <!-- SERVICIOS -->
<div  class="fas fa" class="servicios-section" style="margin-left: 200px;">
    <h1 style="color:RGB(0 130 130); border:RGB(0 130 130);"> BIENVENIDO ADMINISTRADOR</h1>
</div>
<br>
<br>
<!-- ver USUARIOS -->
<div class="fas fa" style="margin-left: 200px;">
    <a href="{{ route('users') }}" class="btn btn-primary">Ver usuarios</a>
</div>
<!-- ver pedidos -->
<div class="fas fa" style="margin-left: 200px;">
    <a href="{{ route('compras') }}" class="btn btn-primary">Ver compras</a>
</div>
<br>
<br>
<!-- formulario informes -->
<div class="fas fa" style="margin-left: 200px;">
    <a href="{{ route('admin.subir-producto') }}" class="btn btn-primary">Subir un nuevo informe</a>
</div>

<!-- ver productos -->
<div class="fas fa" style="margin-left: 100px;">
    <a href="{{ route('informe') }}" class="btn btn-primary">Ver informes</a>
</div>
<br>
<br>
<!-- FORMULARIO ICONOS DEL HOME -->
<div class="fas fa" style="margin-left: 200px;">
    <a href="{{ route('admin.subir_icono') }}" class="btn btn-primary">Subir iconos home</a>
</div>
<!-- ver ICONOS DEL HOME -->
<div class="fas fa" style="margin-left: 145px;">
    <a href="{{ route('iconos') }}" class="btn btn-primary">Ver iconos home</a>
</div>
<br>
<br>
<!-- FORMULARIO CONTENIDO DEL HOME -->
<div class="fas fa" style="margin-left: 200px;">
    <a href="{{ route('admin.subir-contenido') }}" class="btn btn-primary">Subir contenido home</a>
</div>
<!-- ver contenido DEL HOME -->
<div class="fas fa" style="margin-left: 110px;">
    <a href="{{ route('contenido') }}" class="btn btn-primary">Ver contenido home</a>
</div>
<br>
<br>
<!-- FORMULARIO noticias DEL HOME -->
<div class="fas fa" style="margin-left: 200px;">
    <a href="{{ route('admin.subir-noticia') }}" class="btn btn-primary">Subir noticias</a>
</div>
<!-- ver noticias DEL HOME -->
<div class="fas fa" style="margin-left: 178px;">
    <a href="{{ route('blogg') }}" class="btn btn-primary">Ver noticias home</a>
</div>
<br>
<br>
<!-- FORMULARIO noticias DEL HOME -->
<div class="fas fa" style="margin-left: 200px;">
    <a href="{{ route('admin.subir-carrusel') }}" class="btn btn-primary">Subir al carrusel</a>
</div>
<!-- ver noticias DEL HOME -->
<div class="fas fa" style="margin-left: 160px;">
    <a href="{{ route('carrusel') }}" class="btn btn-primary">Ver carrusel home</a>
</div>
<br>
<br>
<!-- FORMULARIO marquesina -->
<div class="fas fa" style="margin-left: 200px;">
    <a href="{{ route('admin.subir-marquesina') }}" class="btn btn-primary">Subir a la marquesina</a>
</div>
<!-- ver marquesina -->
<div class="fas fa" style="margin-left: 160px;">
    <a href="{{ route('marquesina') }}" class="btn btn-primary">Ver marquesina</a>
</div>
<br>
<br>
<!-- FORMULARIO marquesina -->
<div class="fas fa" style="margin-left: 200px;">
    <a href="{{ route('admin.subir-cliente') }}" class="btn btn-primary">Subir empresa</a>
</div>
<!-- ver marquesina -->
<div class="fas fa" style="margin-left: 160px;">
    <a href="{{ route('cliente') }}" class="btn btn-primary">Ver empresas</a>
</div>
<br>
<br>
<!-- FOOTER -->
<br>
<br>
<br>
@include('footer.footer')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>