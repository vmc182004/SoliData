<?php

namespace App\Http\Controllers;
use App\Models\Cifra;
use Illuminate\Http\Request;

class CifraController extends Controller
{
    //
    public function formularioCargaCifras()
    {
        return view('ADMIN.subir-cifras');
    }

    public function guardarCifras(Request $request)
    {
        $cifras = new Cifra();
        $cifras->texto_cifras = $request->input('texto_cifras');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/imagenes_cifras', $imageName);
            $cifras->image_cifras = 'storage/imagenes_cifras/' . $imageName;
        }
    
        $cifras->save();
    
        return redirect()->route('admin.cifrass')->with('success', 'subido con éxito');
    }

    public function mostrarCifras()
{
    $cifras = Cifra::all(); // Obtén todos los productos desde la base de datos
    return view('ADMIN/viewss.cifrass', ['cifras' => $cifras]);
}

public function editarCifras($id)
{
    // Aquí debes recuperar el producto con el ID proporcionado y pasarlos a la vista de edición
    $cifras = Cifra::find($id);
    return view('ADMIN.editar-cifras', ['cifras' => $cifras]);
}

public function actualizarCifras(Request $request, $id)
{
    // Recupera el producto con el ID proporcionado
    $cifras = Cifra::find($id);

    $cifras->texto_cifras = $request->input('texto_cifras');

    if ($request->hasFile('new_image')) {
        // Procesa la nueva imagen si se ha cargado
        $image = $request->file('new_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/imagenes_cifras', $imageName);
        $cifras->image_cifras = 'storage/imagenes_cifras/' . $imageName;
    }

    // Actualiza otros campos según sea necesario.
    $cifras->save();

    // Redirige de nuevo a la lista de productos con un mensaje de éxito.
    return redirect()->route('admin.cifrass')->with('success', 'actualizada con éxito');
}

public function eliminarCifras($id)
{
    try {
        // Busca el producto por ID y elimínalo
        $cifras = Cifra::find($id);
        $cifras->delete();

        return redirect()->route('admin.cifrass')->with('success', 'eliminada con éxito');
    } catch (\Exception $e) {
        return redirect()->route('admin.cifrass')->with('error', 'No se puede eliminar debido a restricciones de clave externa.');
    }
}

public function cifras(){
    $cifras= Cifra::all();

return view('cifras', compact('cifras'));

}
}
