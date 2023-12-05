<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>blog | Analítica Solidaria</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <style>
        /* Estilo para tarjetas con ancho fijo */
        .fixed-width-card {
            width: 100%; /* Establece un ancho fijo, puedes ajustar este valor según tus necesidades */
        }
        
    </style>
</head>
<body>
    <!-- Navbar y Cabecera -->
    @include('partials.navbar')
    @include('partials.cab')
    @extends('app')

    <br>
    <div class="container">
    <div class="row">
        @foreach ($noticias as $key => $noticia)
            <div class="col-md-4">
                <div class="card mb-3 @if(count($noticias) < 4) fixed-width-card @endif" style="border-radius: 30px;">
                    <img src="{{ asset($noticia->image_noticia) }}" class="card-img-top" alt="..." style="height: 200px; width: 100%; border-top-left-radius: 30px; border-top-right-radius: 30px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
                    <div class="card-body d-flex flex-column" style="height: 100%;">
                        <h5 class="card-title">{{ $noticia->titulo_noticia }}</h5>
                        <p class="card-text p44" style="max-height: 80px; overflow: hidden; text-overflow: ellipsis;">{!! $noticia->texto_corto !!}</p>
                        <p class="card-text"><small class="text-muted">{{ $noticia->fecha_noticia }}</small></p>
                        {{-- <button type="button" class="btn btn-primary mt-auto" data-toggle="modal" data-target="#noticiaModal{{ $noticia->id }}">
                            Leer más
                        </button> --}}
                        <a href="{{ route('noticias.mostrar', ['id' => $noticia->id]) }}" class="btn btn-primary" style="background-color: #008282; border:#008282; ">Leer más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


    
    <div class="d-flex justify-content-center">
        {{ $noticias->links('pagination::simple-bootstrap-4') }} <!-- Mostrar solo números de página -->
    </div>

    <br>
    <br>
   
    <br>
    <!-- footer -->
    @include('footer.footer')

    <!-- Modales -->
    @foreach ($noticias as $noticia)
        <div class="modal fade" id="noticiaModal{{ $noticia->id }}" tabindex="-1" role="dialog" aria-labelledby="noticiaModalLabel{{ $noticia->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="noticiaModalLabel{{ $noticia->id }}">
                            <img src="{{ asset($noticia->image_noticia) }}" class="card-img-top" alt="..." style="height: 200px; width: 100%;">
                            {{ $noticia->texto_largo }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</body>
</html>
