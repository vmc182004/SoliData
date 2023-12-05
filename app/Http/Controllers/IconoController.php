<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Icono;
use Illuminate\Http\Request;

class IconoController extends Controller
{
    //
    
    public function formularioCargaIcono()
    {
        return view('ADMIN.subir_iconos');
    }

    public function guardarIcono(Request $request)
    {
        $icono = new Icono();
        $icono->name_icono = $request->input('name_icono');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/imagenes_iconos', $imageName);
            $icono->image_icono = 'storage/imagenes_iconos/' . $imageName;
        }
    
        $icono->save();
    
        return redirect('index')->with('success', 'Icono subido con éxito');
    }
    
    public function mostrarIcono()
{
    $icono = Icono::all(); // Obtén todos los productos desde la base de datos
    return view('ADMIN./viewss.iconos', ['icono' => $icono]);
}

public function editarIcono($id)
{
    // Aquí debes recuperar el producto con el ID proporcionado y pasarlos a la vista de edición
    $icono = Icono::find($id);
    return view('ADMIN.editar-icono', ['icono' => $icono]);
}

public function actualizarIcono(Request $request, $id)
{
    // Recupera el producto con el ID proporcionado
    $icono = Icono::find($id);
    $icono->name_icono = $request->input('name_icono');

    if ($request->hasFile('new_image')) {
        // Procesa la nueva imagen si se ha cargado
        $image = $request->file('new_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/imagenes_iconos', $imageName);
        $icono->image_icono = 'storage/imagenes_iconos/' . $imageName;
    }

    // Actualiza otros campos según sea necesario.
    $icono->save();

    // Redirige de nuevo a la lista de productos con un mensaje de éxito.
    return redirect()->route('iconos')->with('success', 'Icono actualizado con éxito');
}

// Controlador que carga la vista index
// public function mostrarIndex()
// {
//     $iconos = Icono::all(); // Obtén todos los iconos desde la base de datos
//     return view('index', ['iconos' => $iconos]);
// }

public function eliminarIcono($id)
{
    try {
        // Busca el producto por ID y elimínalo
        $icono = Icono::find($id);
        $icono->delete();

        return redirect()->route('iconos')->with('success', 'Icono eliminado con éxito');
    } catch (\Exception $e) {
        return redirect()->route('iconos')->with('error', 'No se puede eliminar el icono debido a restricciones de clave externa.');
    }
}

}
