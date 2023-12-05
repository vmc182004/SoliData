<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    public function formularioCargaCliente()
    {
        return view('ADMIN.subir-cliente');
    }

    public function guardarCliente(Request $request)
    {
        
        $cliente = new Cliente();
        $cliente->nombreEmpresa = $request->input('nombreEmpresa');
        $cliente->nitEmpresa = $request->input('nitEmpresa');
        $cliente->activos = $request->input('activos');
        $cliente->save();
    
        return redirect('cliente')->with('success', 'Empresa subida con éxito');
    }

    // public function mostrarCliente()
    // {
    //     $cliente = cliente::all(); // Obtén todos los productos desde la base de datos
    //     return view('ADMIN/viewss.cliente', ['cliente' => $cliente]);
    // }
    public function mostrarCliente(Request $request)
    {
        $search = $request->input('search');
    
        $clientes = Cliente::query();
    
        if ($search) {
            $clientes->where(function ($query) use ($search) {
                $query->where('nitEmpresa', 'like', '%' . $search . '%')
                      ->orWhere('sigla', 'like', '%' . $search . '%');
            });
        }
    
        $clientes = $clientes->paginate(10);
    
        return view('ADMIN.viewss.cliente', compact('clientes', 'search'));
    }
    
    

    public function editarCliente($id)
    {
        // Aquí debes recuperar el producto con el ID proporcionado y pasarlos a la vista de edición
        $cliente = cliente::find($id);
        return view('ADMIN.editar-cliente', ['cliente' => $cliente]);
    }
    
    public function actualizarCliente(Request $request, $id)
{
    // Recupera el producto con el ID proporcionado
    $cliente = cliente::find($id);
    $cliente->nombreEmpresa = $request->input('nombreEmpresa');
    $cliente->nitEmpresa = $request->input('nitEmpresa');
    $cliente->activos = $request->input('activos');
    // Actualiza otros campos según sea necesario.
    $cliente->save();

    // Redirige de nuevo a la lista de productos con un mensaje de éxito.
    return redirect()->route('cliente')->with('success', 'empresa actualizado con éxito');
}

public function eliminarCliente($id)
{
    try {
        // Busca el producto por ID y elimínalo
        $cliente = cliente::find($id);
        $cliente->delete();

        return redirect()->route('cliente')->with('success', 'empresa eliminado con éxito');
    } catch (\Exception $e) {
        return redirect()->route('cliente')->with('error', 'No se puede eliminar el indicador debido a restricciones de clave externa.');
    }
}
}
