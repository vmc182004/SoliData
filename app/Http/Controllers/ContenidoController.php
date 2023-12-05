<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contenido;
use Illuminate\Http\Request;

class ContenidoController extends Controller
{
    //
    public function formularioCargaContenido()
    {
        return view('ADMIN.subir-contenido');
    }

    public function guardarContenido(Request $request)
    {
        $contenido = new Contenido();
        $contenido->titulo_contenido = $request->input('titulo_contenido');
        $contenido->texto_contenido = $request->input('texto_contenido');
        $contenido->name_boton = $request->input('name_boton');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/imagenes_contenido', $imageName);
            $contenido->image_contenido = 'storage/imagenes_contenido/' . $imageName;
        }
    
        $contenido->save();
    
        return redirect('index')->with('success', 'contenido subido con éxito');
    }
    
    public function mostrarContenido()
{
    $contenido = Contenido::all(); // Obtén todos los productos desde la base de datos
    return view('ADMIN/viewss.contenido', ['contenido' => $contenido]);
}

public function editarContenido($id)
{
    // Aquí debes recuperar el producto con el ID proporcionado y pasarlos a la vista de edición
    $contenido = Contenido::find($id);
    return view('ADMIN.editar-contenido', ['contenido' => $contenido]);
}

public function actualizarContenido(Request $request, $id)
{
    // Recupera el producto con el ID proporcionado
    $contenido = Contenido::find($id);
    $contenido->titulo_contenido = $request->input('titulo_contenido');
    $contenido->texto_contenido = $request->input('texto_contenido');
    $contenido->name_boton = $request->input('name_boton');

    if ($request->hasFile('new_image')) {
        // Procesa la nueva imagen si se ha cargado
        $image = $request->file('new_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/imagenes_contenido', $imageName);
        $contenido->image_contenido = 'storage/imagenes_contenido/' . $imageName;
    }

    // Actualiza otros campos según sea necesario.
    $contenido->save();

    // Redirige de nuevo a la lista de productos con un mensaje de éxito.
    return redirect()->route('contenido')->with('success', 'contenido actualizado con éxito');
}

// Controlador que carga la vista index
// public function mostrarIndexContenido()
// {
//     $contenido = Contenido::all(); // Obtén todos los iconos desde la base de datos
//     return view('index', ['contenido' => $contenido]);
// }

public function eliminarContenido($id)
{
    try {
        // Busca el producto por ID y elimínalo
        $contenido = Contenido::find($id);
        $contenido->delete();

        return redirect()->route('contenido')->with('success', 'contenido eliminado con éxito');
    } catch (\Exception $e) {
        return redirect()->route('contenido')->with('error', 'No se puede eliminar el contenido debido a restricciones de clave externa.');
    }
}

}
