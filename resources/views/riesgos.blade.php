<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión de riesgos | Analítica Solidaria</title>
    <style>
       
    

    </style>
</head>
<body>
    <!-- Navbar y Cabecera -->
    @include('partials.navbar')
    <br>
    <div class="container mt-4">
        <div class="row">
            @foreach ($riesgos as $riesgos)
            <img src="{{ asset($riesgos->image_riesgos) }}" alt="{{ $riesgos->image_riesgos }} " style="width:1000px; height:500px;margin-left: 150px;">
            <p style="margin-left:150px;">{!! $riesgos->texto_riesgos !!}</p>
            @endforeach
        </div>
    </div>
    <!-- footer -->
    @include('footer.footer')
</body>
</html>
