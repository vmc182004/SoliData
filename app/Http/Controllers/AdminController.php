<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function Admin(){
        if (Auth::user()->role === 'admin') {
        return view('ADMIN.admin');
        }
else{
    return redirect()->route('login');
}
    }
}
