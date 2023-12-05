<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Marquesina;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogController extends Controller
{
    //

    public function formularioCargaBlog()
    {
        return view('blog');
    }
    public function blog()
    {
        $noticias = Noticia::paginate(6); // Muestra 6 noticias por página
    
        // Obtener los datos de la marquesina
        $Marquesina = Marquesina::all(); // Ajusta esto según la lógica de tu modelo Marquesina
    
        return view('blog', compact('noticias', 'Marquesina'));

    }
    


}

