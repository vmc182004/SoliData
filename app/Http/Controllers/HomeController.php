<?php

namespace App\Http\Controllers;
use App\Models\Icono;
use App\Models\Compra;
use App\Models\Noticia;
use App\Models\Product;
use App\Models\Boletine;
use App\Models\Carrusel;
use App\Models\Contenido;
use App\Models\Marquesina;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MarquesinaController;


class HomeController extends Controller
{
    //
    public function index()
    {
        $iconos = Icono::all();
        $contenido = Contenido::all();
        $productos= Product::all();
        $carrusel= Carrusel::all();
        $boletine= Boletine::all();
        $compra = Compra::all();
        $Marquesina = Marquesina::all();
        $constantAssets = 2000000.00;
        $user = Auth::user();
        // Crea un array para rastrear si el usuario ha comprado cada producto
        $hasPurchased = [];
        $rates = [];

    // Verifica si el usuario ha iniciado sesión
    if (Auth::check()) {
        $user = Auth::user();

        foreach ($productos as $producto) {
            // Comprueba si existe una compra asociada al usuario y al producto
            $hasPurchased[$producto->id] = $user->compras->contains('product_id', $producto->id);
        }
    } else {
        // Si el usuario no ha iniciado sesión, establece todos los productos como no comprados
        foreach ($productos as $producto) {
            $hasPurchased[$producto->id] = false;
        }
    }

    $marquesinaController = new MarquesinaController();
    $rates = $marquesinaController->index()->getData()['rates'];

        return view('index', ['iconos' => $iconos, 
        'contenido' => $contenido, 
        'productos' => $productos, 
        'carrusel' => $carrusel, 
        'boletine' => $boletine, 
        'compra' => $compra,
        'hasPurchased' => $hasPurchased, 
        'Marquesina' => $Marquesina,
        'rates' => $rates,
        'constantAssets' => $constantAssets,
        'user' => $user,
    ]);
    }

}
