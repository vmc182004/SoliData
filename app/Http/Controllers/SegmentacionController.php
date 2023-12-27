<?php

namespace App\Http\Controllers;
use App\Models\Segmentacion;
use Illuminate\Http\Request;

class SegmentacionController extends Controller
{
    //
    public function mostrarSegmentacion()
    {
        $segmentacion = Segmentacion::all(); // Obtén todos los productos desde la base de datos
        return view('ADMIN/viewss.segmentacion', ['segmentacion' => $segmentacion]);
    }
}
