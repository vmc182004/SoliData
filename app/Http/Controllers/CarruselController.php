<?php

namespace App\Http\Controllers;

use App\Models\Carrusel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarruselController extends Controller
{
    //
    public function formularioCargaCarrusel()
    {
        return view('ADMIN.subir-carrusel');
    }

    public function guardarCarrusel(Request $request)
    {
        
        $carrusel = new Carrusel();
        $carrusel->titulo_carrusel = $request->input('titulo_carrusel');
        $carrusel->texto_carrusel = $request->input('texto_carrusel');
        $carrusel->fecha_carrusel = $request->input('fecha_carrusel');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/imagenes_carrusel', $imageName);
            $carrusel->image_carrusel = 'storage/imagenes_carrusel/' . $imageName;
        }
    
        $carrusel->save();
    
        return redirect('index')->with('success', 'carrusel subido con éxito');
    }
    
    public function mostrarCarrusel()
{
    $carrusel = Carrusel::all(); // Obtén todos los productos desde la base de datos
    return view('ADMIN/viewss.carrusel', ['carrusel' => $carrusel]);
}

public function editarCarrusel($id)
{
    // Aquí debes recuperar el producto con el ID proporcionado y pasarlos a la vista de edición
    $carrusel = Carrusel::find($id);
    return view('ADMIN.editar-carrusel', ['carrusel' => $carrusel]);
}

public function actualizarCarrusel(Request $request, $id)
{
    // Recupera el producto con el ID proporcionado
    $carrusel = Carrusel::find($id);

    $carrusel->titulo_carrusel = $request->input('titulo_carrusel');
    $carrusel->texto_carrusel = $request->input('texto_carrusel');
    $carrusel->fecha_carrusel = $request->input('fecha_carrusel');

    if ($request->hasFile('new_image')) {
        // Procesa la nueva imagen si se ha cargado
        $image = $request->file('new_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/imagenes_carrusel', $imageName);
        $carrusel->image_carrusel = 'storage/imagenes_carrusel/' . $imageName;
    }

    // Actualiza otros campos según sea necesario.
    $carrusel->save();

    // Redirige de nuevo a la lista de productos con un mensaje de éxito.
    return redirect()->route('carrusel')->with('success', 'carrusel actualizado con éxito');
}

public function eliminarCarrusel($id)
{
    try {
        // Busca el producto por ID y elimínalo
        $carrusel = Carrusel::find($id);
        $carrusel->delete();

        return redirect()->route('carrusel')->with('success', 'elemento del carrusel eliminado con éxito');
    } catch (\Exception $e) {
        return redirect()->route('carrusel')->with('error', 'No se puede eliminar debido a restricciones de clave externa.');
    }
}
}
