<?php

namespace App\Http\Controllers;

use App\Models\Boletine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoletineController extends Controller
{
    //
    public function formularioCargaBoletine()
    {
        return view('ADMIN.subir-boletine');
    }

    public function guardarBoletine(Request $request)
    {
        
        $boletine = new Boletine();
        $boletine->titulo_boletin = $request->input('titulo_boletin');
        $boletine->texto_boletin = $request->input('texto_boletin');
        $boletine->nombreBoton_boletin = $request->input('nombreBoton_boletin');
        $boletine->año_boletin = $request->input('año_boletin');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/imagenes_boletine', $imageName);
            $boletine->image_boletin = 'storage/imagenes_boletine/' . $imageName;
        }
        if ($request->hasFile('icono_boletin')) {
            $icono_boletin = $request->file('icono_boletin');
            $imageName = time() . '_' . $icono_boletin->getClientOriginalName();
            $icono_boletin->storeAs('public/imagenes_boletine', $imageName);
            $boletine->icono_boletin = 'storage/imagenes_boletine/' . $imageName;
        }
        $boletine->save();
    
        return redirect('index')->with('success', 'boletin subido con éxito');
    }
    
    public function mostrarBoletine()
{
    $boletine = Boletine::all(); // Obtén todos los productos desde la base de datos
    return view('ADMIN/viewss.boletine', ['boletine' => $boletine]);
}

public function editarBoletine($id)
{
    // Aquí debes recuperar el producto con el ID proporcionado y pasarlos a la vista de edición
    $boletine = Boletine::find($id);
    return view('ADMIN.editar-boletine', ['boletine' => $boletine]);
}

public function actualizarBoletine(Request $request, $id)
{
    // Recupera el producto con el ID proporcionado
    $boletine = Boletine::find($id);
    $boletine->titulo_boletin = $request->input('titulo_boletin');
    $boletine->texto_boletin = $request->input('texto_boletin');
    $boletine->nombreBoton_boletin = $request->input('nombreBoton_boletin');
    $boletine->año_boletin = $request->input('año_boletin');

    if ($request->hasFile('new_image_icono')) {
        // Procesa la nueva imagen si se ha cargado
        $image = $request->file('new_image_icono');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/imagenes_boletine', $imageName);
        $boletine->icono_boletin = 'storage/imagenes_boletine/' . $imageName;
    }
    if ($request->hasFile('new_image')) {
        // Procesa la nueva imagen si se ha cargado
        $image = $request->file('new_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/imagenes_boletine', $imageName);
        $boletine->image_boletin = 'storage/imagenes_boletine/' . $imageName;
    }

    // Actualiza otros campos según sea necesario.
    $boletine->save();

    // Redirige de nuevo a la lista de productos con un mensaje de éxito.
    return redirect()->route('boletine')->with('success', 'boletin actualizado con éxito');
}

public function eliminarBoletine($id)
{
    try {
        // Busca el producto por ID y elimínalo
        $boletine = Boletine::find($id);
        $boletine->delete();

        return redirect()->route('boletine')->with('success', 'boletin eliminado con éxito');
    } catch (\Exception $e) {
        return redirect()->route('boletine')->with('error', 'No se puede eliminar debido a restricciones de clave externa.');
    }
}
}
