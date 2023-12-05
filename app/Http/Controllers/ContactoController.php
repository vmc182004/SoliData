<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function contacto(Request $request)
    {
        // Valida y guarda los datos del formulario en la base de datos.
        $contacto = new Contacto();
        $contacto->name = $request->input('name');
        $contacto->apellidos = $request->input('apellidos');
        $contacto->email = $request->input('email');
        $contacto->fecha_nacimiento = $request->input('fecha_nacimiento');
        $contacto->tipo_documento = $request->input('tipo_documento');
        $contacto->numero_documento = $request->input('numero_documento');
        $contacto->celular = $request->input('celular');
        $contacto->save();

        // Redirige a la página de confirmación con un mensaje.
        return redirect()->route('contacto')->with('success', 'Formulario enviado correctamente');
    }

    public function mostrarContacto(Request $request)
{
    $fechaBusqueda = $request->input('fecha_busqueda');

    // Obtén todos los contactos o filtra por fecha si se proporciona una fecha de búsqueda
    $contacto = $fechaBusqueda ? Contacto::whereDate('created_at', $fechaBusqueda)->get() : Contacto::all();

    return view('ADMIN/viewss.contact', ['contacto' => $contacto]);
}

    /**
     * Display a listing of the resource.
     */
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
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}
