<?php

namespace App\Http\Controllers;
use App\Models\TipoEntidad;
use Illuminate\Http\Request;

class TipoEntidadController extends Controller
{
    //
    public function mostrarTipoEntidad()
    {
        $tipoEntidad = TipoEntidad::all(); // Obtén todos los productos desde la base de datos
        return view('ADMIN/viewss.tipoEntidad', ['tipoEntidad' => $tipoEntidad]);
    }
}
