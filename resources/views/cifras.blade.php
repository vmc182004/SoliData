<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cifras generales | Analítica Solidaria</title>
    <style>
      
    </style>
</head>
<body>
    <!-- Navbar y Cabecera -->
    @include('partials.navbar')
<!--  -->
<br>
<div class="container mt-4">
    <div class="row">
        @foreach ($cifras as $cifras)
        <img src="{{ asset($cifras->image_cifras) }}" alt="{{ $cifras->image_cifras }}" style="width:1000px; height:500px;margin-left: 150px;">
        
        <p style="margin-left:150px;">{!! $cifras->texto_cifras !!}</p>
        @endforeach
    </div>
</div>


<br>
    <!-- footer -->
    @include('footer.footer')
</body>
</html>
