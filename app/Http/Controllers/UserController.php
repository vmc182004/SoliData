<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //

public function verUsuarios(Request $request)
{
    $search = $request->input('search');

    // Obtén todos los usuarios o filtra por nombre, correo o rol si se proporciona un término de búsqueda
    $usuarios = $search
        ? User::where('name', 'like', '%' . $search . '%')
               ->orWhere('email', 'like', '%' . $search . '%')
               ->orWhere('role', 'like', '%' . $search . '%')
               ->get()
        : User::all();

    return view('ADMIN/viewss.users', ['usuarios' => $usuarios]);
}

public function editarUsuario($id)
{
    $usuario = User::find($id); // Encuentra el usuario por ID
    return view('ADMIN.editar_usuario', ['usuario' => $usuario]);
}

public function actualizarUsuario(Request $request, $id)
{
    $usuario = User::find($id);
    $usuario->role = $request->input('role');
    $usuario->save();

    return redirect()->route('users')->with('success', 'Rol de usuario actualizado con éxito');
}


}
