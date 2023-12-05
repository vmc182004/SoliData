<?php

namespace App\Http\Controllers;

use App\Models\Boletin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoletinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function boletin(Request $request)
    {
        // Valida y guarda los datos del formulario en la base de datos.
        $boletin = new Boletin();
        $boletin->nombre = $request->input('nombre');
        $boletin->emailB = $request->input('emailB');
        $boletin->save();

        // Redirige a la página de confirmación con un mensaje.
        return redirect()->route('boletin')->with('success', 'Formulario enviado correctamente');
    }
    public function mostrarSubs(Request $request)
    {
        $fechaBusqueda = $request->input('fecha_busqueda');
        $boletin = $fechaBusqueda ? Boletin::whereDate('created_at', $fechaBusqueda)->get() : Boletin::all(); // Obtén todos los productos desde la base de datos
        return view('ADMIN/viewss.subs', ['boletin' => $boletin]);
    }
   
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Boletin $boletin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boletin $boletin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boletin $boletin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boletin $boletin)
    {
        //
    }
}
