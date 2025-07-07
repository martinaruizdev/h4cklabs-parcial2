<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required',
            'password' => 'required|min:5|confirmed',
        ], [
            'name.required' => 'Debe ingresar un nombre de ususario',
            'name.min' => 'El nombre debe tener al menos :min caracteres',
            'email.required' => 'Debe ingresar un correo',
            'password.required' => 'Debe ingresar una conraseña',
            'password.min' => 'La contraseña debe tener al menos :min caracteres',
            'password.confirmed' => 'La contraseña debe coincidir',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role_id' => 2,
        ]);

        Auth::login($user);

        return redirect()->route('machines.index')->with('feedback.message', 'Has cruzado el firewall con éxito,'. $user->name . '. Bienvenido a la red' );
    }
}

