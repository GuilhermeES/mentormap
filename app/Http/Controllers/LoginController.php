<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index () {
        return view('login');
    }

    public function login(Request $request) {

            $credentials = $request->validate([
                'email' => 'required|string',
                'password' => 'required|string',
            ],[
                'email.required' => 'O campo email é obrigatório.',
                'email.string' => 'O campo email deve ser uma string.',
                'password.required' => 'O campo senha é obrigatório.',
                'password.string' => 'O campo senha deve ser uma string.',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Credenciais inválidas. Tente novamente.');
            }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
