<?php

namespace App\Http\Controllers;
use App\Models\Estadistica;
use Illuminate\Http\Request;

class EstadisticaController extends Controller
{
    //
    public function formularioCargaEstadisticas()
    {
        return view('ADMIN.subir-estadisticas');
    }

    public function guardarEstadisticas(Request $request)
    {
        $estadisticas = new Estadistica();
        $estadisticas->texto_estadisticas = $request->input('texto_estadisticas');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/imagenes_estadisticas', $imageName);
            $estadisticas->image_estadisticas = 'storage/imagenes_estadisticas/' . $imageName;
        }
    
        $estadisticas->save();
    
        return redirect()->route('admin.estadisticass')->with('success', 'subido con éxito');
    }

    public function mostrarEstadisticas()
{
    $estadisticas = Estadistica::all(); // Obtén todos los productos desde la base de datos
    return view('ADMIN/viewss.estadisticass', ['estadisticas' => $estadisticas]);
}

public function editarEstadisticas($id)
{
    // Aquí debes recuperar el producto con el ID proporcionado y pasarlos a la vista de edición
    $estadisticas = Estadistica::find($id);
    return view('ADMIN.editar-estadisticas', ['estadisticas' => $estadisticas]);
}

public function actualizarEstadisticas(Request $request, $id)
{
    // Recupera el producto con el ID proporcionado
    $estadisticas = Estadistica::find($id);

    $estadisticas->texto_estadisticas = $request->input('texto_estadisticas');

    if ($request->hasFile('new_image')) {
        // Procesa la nueva imagen si se ha cargado
        $image = $request->file('new_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/imagenes_estadisticas', $imageName);
        $estadisticas->image_estadisticas = 'storage/imagenes_estadisticas/' . $imageName;
    }

    // Actualiza otros campos según sea necesario.
    $estadisticas->save();

    // Redirige de nuevo a la lista de productos con un mensaje de éxito.
    return redirect()->route('admin.estadisticass')->with('success', 'actualizada con éxito');
}

public function eliminarEstadisticas($id)
{
    try {
        // Busca el producto por ID y elimínalo
        $estadisticas = Estadistica::find($id);
        $estadisticas->delete();

        return redirect()->route('admin.estadisticass')->with('success', 'eliminada con éxito');
    } catch (\Exception $e) {
        return redirect()->route('admin.estadisticass')->with('error', 'No se puede eliminar debido a restricciones de clave externa.');
    }
}

public function estadisticas(){
    $estadisticas= Estadistica::all();

return view('estadisticas', compact('estadisticas'));

}
}
