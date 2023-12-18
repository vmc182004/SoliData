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
    public function index()
    {

        //llamar a tipo de entidad 

        $tipoEntidades = TipoEntidad::get();
        $csv = Reader::createFromPath(public_path('excel/tecnoparques.csv'), 'r');
        $csv->setHeaderOffset(0); // Si el archivo tiene encabezados
        $seeders = $csv->getRecords();

        $datos = [];
 
        foreach($seeders as $seeder){
            $datos[] = [
                'nameEmpresa' => $seeder['nameEmpresa'],
                'nameEntidad' => $seeder['tipoEntidad'],
                'activosEmpresa' => $seeder['activos'],
            ];
        }
        
        $var = [];

        

        $var2 = [];
        foreach($datos as $dato){
            foreach($tipoEntidades as $entidad){
                if($dato['nameEntidad'] === $entidad->nameEntidad){
                    $search = Segmentacion::find($entidad->id);
                    if($dato['activosEmpresa'] > $search->mayor and $dato['activosEmpresa'] < $search->menor){
                        $var2[] = $dato['nameEmpresa'].' '.$dato['activosEmpresa'].' '.$search->id.' '. $search->nameSegmentacion.' '. $search->tipo_entidad_id;
                    }
                }
            }
            
        }

        dd($var2, $datos);




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
