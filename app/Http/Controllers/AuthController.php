<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
        
    }

    public function authenticate(Request $request){
        $credentials = $request->only(['email', 'password']);

        if(Auth::attempt($credentials)){
            return redirect()
            ->intended(route('news.index'))
            ->with('feedback.message', 'Acceso permitido, bienvenido de nuevo.');
        }

        return redirect()
        ->back()
        ->withInput()
        ->with('feedback.message', 'Acceso denegado. Las credenciales son incorrectas, inténtelo nuevamente.');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
        ->route('auth.login')
        ->with('feedback.message', 'Sesión cerrada correctamente');
    }
}
