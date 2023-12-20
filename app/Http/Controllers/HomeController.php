<?php

namespace App\Http\Controllers;
use App\Models\Icono;
use App\Models\Compra;
use App\Models\Noticia;
use App\Models\Product;
use App\Models\Boletine;
use App\Models\Carrusel;
use App\Models\Contenido;
use App\Models\Cliente;
use App\Models\Marquesina;
use App\Models\Segmentacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MarquesinaController;

use App\Models\TipoEntidad;
use League\Csv\Reader;

class HomeController extends Controller
{
    //
    // public function index()
    // {
    //     $iconos = Icono::all();
    //     $contenido = Contenido::all();
    //     $productos= Product::all();
    //     $carrusel= Carrusel::all();
    //     $boletine= Boletine::all();
    //     $compra = Compra::all();
    //     $Marquesina = Marquesina::all();
    //     $constantAssets = 2000000.00;
    //     $user = Auth::user();
    //     // Crea un array para rastrear si el usuario ha comprado cada producto
    //     $hasPurchased = [];
    //     $rates = [];

    // // Verifica si el usuario ha iniciado sesión
    // if (Auth::check()) {
    //     $user = Auth::user();

    //     foreach ($productos as $producto) {
    //         // Comprueba si existe una compra asociada al usuario y al producto
    //         $hasPurchased[$producto->id] = $user->compras->contains('product_id', $producto->id);
    //     }
    // } else {
    //     // Si el usuario no ha iniciado sesión, establece todos los productos como no comprados
    //     foreach ($productos as $producto) {
    //         $hasPurchased[$producto->id] = false;
    //     }
    // }

    // $marquesinaController = new MarquesinaController();
    // $rates = $marquesinaController->index()->getData()['rates'];

    //     return view('index', ['iconos' => $iconos,
    //     'contenido' => $contenido,
    //     'productos' => $productos,
    //     'carrusel' => $carrusel,
    //     'boletine' => $boletine,
    //     'compra' => $compra,
    //     'hasPurchased' => $hasPurchased,
    //     'Marquesina' => $Marquesina,
    //     'rates' => $rates,
    //     'constantAssets' => $constantAssets,
    //     'user' => $user,

    // ]);
    // }

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

    if (Auth::check()) {
        // return redirect()->route('login'); // Redirige a la página de inicio de sesión
    

    $cliente = Cliente::all();

    $cliente = Auth::user()->cliente;
    $segmentacion = Auth::user()->cliente->segmentacion->nameSegmentacion;
    $tipoentidad = Auth::user()->cliente->segmentacion->tipoentidad;

    // dd(c);

    $products = Product::all();

    $priceProductos = [];
    $newProductos = [];
    foreach($products as $i => $product)
    {
        $priceProductos[] = [
            'id' => $product->id,
            'Micro2' => $product->micro2,
            'Micro1' => $product->micro1,
            'Pequeñas' => $product->pequeñas,
            'Medianas' => $product->medianas,
            'Grandes' => $product->grandes,
            'Megas' => $product->megas,
            'Top' => $product->top,
        ];

        foreach( $priceProductos as $j => $priceProducto){
            if(isset($priceProducto[$segmentacion])){
                // dd($priceProducto[$segmentacion]);
                $newProductos[$i] = [
                    'id' => $product->id,
                    'price' => $priceProducto[$segmentacion],
                    'name' => $product->name,
                    'description' => $product->description,
                    'contenido' => $product->contenido,
                    'image_path' => $product->image_path,
                ];
            }
        }
    }
    // dd($newProductos);

    $Marquesina = Marquesina::all();
    $constantAssets = 2000000;
    $user = Auth::user();
    $rates = [];

    // Crea un array para rastrear si el usuario ha comprado cada producto
    $hasPurchased = [];

    // Verifica si el usuario ha iniciado sesión
    if (Auth::check()) {
        $user = Auth::user();

        foreach ($newProductos as $newProduct) {
            // Comprueba si existe una compra asociada al usuario y al producto
            $hasPurchased[$newProduct['id']] = $user->compras->contains('product_id', $newProduct['id']);
        }

    } else {
        // Si el usuario no ha iniciado sesión, establece todos los productos como no comprados
        foreach ($newProductos as $newProduct) {
            $hasPurchased[$newProduct['id']] = false;
        }
    }
    // Suponiendo que $nit es el NIT ingresado por el cliente al registrarse


    $marquesinaController = new MarquesinaController();
    $rates = $marquesinaController->index()->getData()['rates'];

    return view('index', [
        'iconos' => $iconos,
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
        'newProductos' => $newProductos
    ]);
}
else {

    $Marquesina = Marquesina::all();
    $constantAssets = 2000000;

    $marquesinaController = new MarquesinaController();
    $rates = $marquesinaController->index()->getData()['rates'];

    // Lógica para obtener los productos (elimina la lógica de $newProductos, $hasPurchased, etc.)
    $products = Product::all();

    $priceProductos = [];
    $newProductos = [];
    foreach($products as $i => $product)
    {
        $priceProductos[] = [
            'id' => $product->id,
            'Micro2' => $product->micro2,
            'Micro1' => $product->micro1,
            'Pequeñas' => $product->pequeñas,
            'Medianas' => $product->medianas,
            'Grandes' => $product->grandes,
            'Megas' => $product->megas,
            'Top' => $product->top,
        ];

            if(!Auth::check()){
                // dd($priceProducto[$segmentacion]);
                $newProductos[$i] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' =>$product->price,
                    'description' => $product->description,
                    'contenido' => $product->contenido,
                    'image_path' => $product->image_path,
                ];
            }
    }
    $hasPurchased = [];

    // Verifica si el usuario ha iniciado sesión
    if (Auth::check()) {
        $user = Auth::user();

        foreach ($newProductos as $newProduct) {
            // Comprueba si existe una compra asociada al usuario y al producto
            $hasPurchased[$newProduct['id']] = $user->compras->contains('product_id', $newProduct['id']);
        }

    } else {
        // Si el usuario no ha iniciado sesión, establece todos los productos como no comprados
        foreach ($newProductos as $newProduct) {
            $hasPurchased[$newProduct['id']] = false;
        }
    }
    return view('index', [
        'iconos' => $iconos,
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
        'newProductos' => $newProductos
    ]);
}
    }

}
