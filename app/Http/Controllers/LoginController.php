<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    //
    // public function register(Request $request)
    // {
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);

    //     $clientes = Cliente::get();

    //     foreach ($clientes as $cliente) {
    //         if($cliente->nitEmpresa === $request->nit){
    //             $user->cliente_id = $cliente->id; // Agregar el campo NIT
    //         }
    //     }
     
    //     try {
    //         $user->save();
    //     } catch (\Exception $e) {
    //         // Si se produce un error, agrega un mensaje de error a la sesión
    //         return redirect(route('registro'))->with('error', 'Error al registrarse, verifique los datos y el correo electrónico único.');
    //     }
     
    //     Auth::login($user);
     
    //     // Agregar un mensaje de éxito si el registro se realizó correctamente
    //     return redirect(route('login'))->with('success', '¡Registro exitoso! Ya puedes iniciar sesión');
    // }
    public function register(Request $request)
{
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);

    $clientes = Cliente::get();
    $nitMatches = false;

    foreach ($clientes as $cliente) {
        if ($cliente->nitEmpresa === $request->nit) {
            $user->cliente_id = $cliente->id; // Agregar el campo NIT
            $nitMatches = true;
            break;
        }
    }

    if (!$nitMatches) {
        return redirect(route('registro'))->with('error', 'El NIT no coincide con ninguna empresa registrada.');
    }
 
    try {
        $user->save();
    } catch (\Exception $e) {
        // Si se produce un error, agrega un mensaje de error a la sesión
        return redirect(route('registro'))->with('error', 'Error al registrarse, verifique los datos y el correo electrónico único.');
    }
 
    Auth::login($user);
 
    // Agregar un mensaje de éxito si el registro se realizó correctamente
    return redirect(route('login'))->with('success', '¡Registro exitoso! Ya puedes iniciar sesión');
}

    
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Verificar si el usuario es administrador
            if (Auth::user()->role === 'admin') {
                // Redireccionar al panel de administrador
                return redirect()->route('admin');
            } else {
                // Redireccionar al panel de usuario normal
                return redirect()->route('index');
            }
        }
    
        return redirect(route('login'))->with('error', 'Credenciales incorrectas');
    }
    


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('index'));
    }
    public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

public function handleGoogleCallback()
{
    
    $user = Socialite::driver('google')->user();
    // Comprueba si el usuario ya existe en tu base de datos por su correo electrónico
    $existingUser = User::where('email', $user->email)->first();

    if ($existingUser) {
        // Si el usuario ya existe, inicia sesión
        Auth::login($existingUser);
        Auth::user()->role === 'user';
        return redirect('/index'); // Redirige a la página de inicio de sesión exitosa
    } else {
        // Si el usuario no existe, puedes crearlo en tu base de datos
        $newUser = new User();
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->password = Hash::make(Str::random(12)); // Contraseña aleatoria
        $newUser->role = 'user'; // Asigna el rol 'user' al nuevo usuario
        
        $newUser->save();
        
        Auth::login($newUser);
        
        return redirect('/index'); // Redirige a la página de inicio de sesión exitosa
    }
}
}