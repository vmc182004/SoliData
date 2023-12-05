<?php

namespace App\Http\Controllers;

use HTMLPurifier;
use App\Models\Product;
use App\Models\Boletine;
use HTMLPurifier_Config;
use App\Models\Marquesina;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    
    public function formularioCarga()
    {
        return view('ADMIN.subir_producto');
    }

    public function guardarProducto(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->contenido = $request->input('contenido');
        $product->contenido = html_entity_decode($request->input('contenido'));
        $product->minPrice = $request->input('minPrice');
        $product->maxPrice = $request->input('maxPrice');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/imagenes_product', $imageName);
            $product->image_path = 'storage/imagenes_product/' . $imageName;
        }
    
        $product->save();
    
        // return redirect('shop')->with('success', 'Producto subido con éxito');
        return redirect()->route('informe')->with('success', 'Producto subido con éxito');

    }
    
    public function mostrarProductos()
{
    $productos = Product::all(); // Obtén todos los productos desde la base de datos
    return view('ADMIN/viewss.informe', ['productos' => $productos]);
}

public function editarProducto($id)
{
    // Aquí debes recuperar el producto con el ID proporcionado y pasarlos a la vista de edición
    $producto = Product::find($id);
    return view('ADMIN.editar_producto', ['producto' => $producto]);
}

public function actualizarProducto(Request $request, $id)
{
    // Recupera el producto con el ID proporcionado
    $producto = Product::find($id);
    $producto->name = $request->input('name');
    $producto->description = $request->input('description');
    $producto->minPrice = $request->input('minPrice');
    $producto->maxPrice = $request->input('maxPrice');
    $producto->contenido = html_entity_decode($request->input('contenido'));
    

    if ($request->hasFile('new_image')) {
        // Procesa la nueva imagen si se ha cargado
        $image = $request->file('new_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/imagenes_product', $imageName);
        $producto->image_path = 'storage/imagenes_product/' . $imageName;
    }

    // Actualiza otros campos según sea necesario.
    $producto->save();

    // Redirige de nuevo a la lista de productos con un mensaje de éxito.
    return redirect()->route('informe')->with('success', 'Producto actualizado con éxito');
}

public function eliminarProducto($id)
{
    try {
        // Busca el producto por ID y elimínalo
        $producto = Product::find($id);
        $producto->delete();

        return redirect()->route('informe')->with('success', 'Producto eliminado con éxito');
    } catch (\Exception $e) {
        return redirect()->route('informe')->with('error', 'No se puede eliminar el producto debido a restricciones de clave externa.');
    }
}


}
