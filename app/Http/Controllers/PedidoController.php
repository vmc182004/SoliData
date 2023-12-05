<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pedido;
use App\Models\Marquesina;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon; // Importa la clase Carbon para trabajar con fechas

class PedidoController extends Controller
{
    //
    // public function mostrarPedidosYDetalles()
    // {
    //     $pedidos = Pedido::with('detalles', 'usuario')->get();
    
    //     return view('admin.pedidos-y-detalles', compact('pedidos'));
    // }
    
   
    
    public function mostrarPedidosYDetalles(Request $request)
    {
        $fechaActual = Carbon::now()->format('Y-m-d');
    
        // Cantidad de pedidos del día
        $cantidadPedidosDelDia = Pedido::whereDate('created_at', $fechaActual)->count();
    
        // Suma de pedidos del día
        $ventasDelDia = Pedido::whereDate('created_at', $fechaActual)->sum('total');
    
        // Cantidad de pedidos acumulados
        $cantidadPedidosAcumulados = Pedido::count();
    
        // Suma de pedidos acumulados
        $ventasAcumuladas = Pedido::sum('total');
    
        // Obtener la consulta de pedidos con detalles y usuarios
        $query = Pedido::with('detalles', 'usuario');
    
        // Verificar si se ha enviado una búsqueda
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($query) use ($search) {
                $query->orWhereHas('usuario', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                    $query->orWhere('email', 'like', '%' . $search . '%');
                    $query->orWhere('role', 'like', '%' . $search . '%');
                });
                $query->orWhere('codigo', 'like', '%' . $search . '%');
    
                // Búsqueda en los detalles (asumiendo que 'producto' es el campo)
                $query->orWhereHas('detalles', function ($query) use ($search) {
                    $query->where('producto', 'like', '%' . $search . '%');
                });
            });
        }
    
        // Obtener los pedidos según la consulta
        $pedidos = $query->get();
    
        return view('ADMIN/viewss.compras', compact('pedidos', 'cantidadPedidosDelDia', 'cantidadPedidosAcumulados', 'ventasDelDia', 'ventasAcumuladas'));
    }
    

}
