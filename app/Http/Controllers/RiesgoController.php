<?php

namespace App\Http\Controllers;
use App\Models\Riesgo;
use Illuminate\Http\Request;

class RiesgoController extends Controller
{
    //
    public function formularioCargaRiesgos()
    {
        return view('ADMIN.subir-riesgos');
    }

    public function guardarRiesgos(Request $request)
    {
        $riesgos = new Riesgo();
        $riesgos->texto_riesgos = $request->input('texto_riesgos');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/imagenes_riesgos', $imageName);
            $riesgos->image_riesgos = 'storage/imagenes_riesgos/' . $imageName;
        }
    
        $riesgos->save();
    
        return redirect()->route('admin.riesgoss')->with('success', 'subido con éxito');
    }

    public function mostrarRiesgos()
{
    $riesgos = Riesgo::all(); // Obtén todos los productos desde la base de datos
    return view('ADMIN/viewss.riesgoss', ['riesgos' => $riesgos]);
}

public function editarRiesgos($id)
{
    // Aquí debes recuperar el producto con el ID proporcionado y pasarlos a la vista de edición
    $riesgos = Riesgo::find($id);
    return view('ADMIN.editar-riesgos', ['riesgos' => $riesgos]);
}

public function actualizarRiesgos(Request $request, $id)
{
    // Recupera el producto con el ID proporcionado
    $riesgos = Riesgo::find($id);

    $riesgos->texto_riesgos = $request->input('texto_riesgos');

    if ($request->hasFile('new_image')) {
        // Procesa la nueva imagen si se ha cargado
        $image = $request->file('new_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/imagenes_riesgos', $imageName);
        $riesgos->image_riesgos = 'storage/imagenes_riesgos/' . $imageName;
    }

    // Actualiza otros campos según sea necesario.
    $riesgos->save();

    // Redirige de nuevo a la lista de productos con un mensaje de éxito.
    return redirect()->route('admin.riesgoss')->with('success', 'actualizada con éxito');
}

public function eliminarRiesgos($id)
{
    try {
        // Busca el producto por ID y elimínalo
        $riesgos = Riesgo::find($id);
        $riesgos->delete();

        return redirect()->route('admin.riesgoss')->with('success', 'eliminada con éxito');
    } catch (\Exception $e) {
        return redirect()->route('admin.riesgoss')->with('error', 'No se puede eliminar debido a restricciones de clave externa.');
    }
}

public function riesgos(){
    $riesgos= Riesgo::all();

return view('riesgos', compact('riesgos'));

}
}
