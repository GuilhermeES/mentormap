<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{

    public function index () {
        $user = auth()->user();
        return view('dashboard.perfil', ['user' => $user]);
    }

    public function changeData(Request $request){
        $dados = $request->input();

        $usuario = Auth::user();

        if ($usuario->id) {    
            $registro = User::findOrFail($usuario->id);
            $registro->update($dados);

            return redirect()->back()->with('success', 'Dados alterados com sucesso');
        } else {
            return redirect()->back()->with('error', 'Error ao alterar dados, tente novamente');
        }
    }
    
    public function changePassword(Request $request)
    {
        $request->validate([
            'senhaAtual' => 'required',
            'novaSenha' => 'required',
        ]);

        $usuario = Auth::user();

        if (Hash::check($request->senhaAtual, $usuario->password)) {
            User::whereId($usuario->id)->update([
                'password' => Hash::make($request->novaSenha)
            ]);

            return redirect()->back()->with('success', 'Senha alterada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Senha atual incorreta. Tente novamente.');
        }
    }
}
