<?php

namespace App\Http\Controllers;
use App\Models\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GerenciarController extends Controller
{
    public function index() {
        $registros = Site::all();
        return view('dashboard.gerenciar', ['registros' => $registros]);
    }

    public function storeOrUpdate(Request $request, $id = null) {
        $dados = request()->except(['_token']);
        
        if (request()->hasFile('image')) {
            $imagem = request()->file('image');
            $nomeImagem = time() . '_' . $imagem->getClientOriginalName();
            $imagem->move(public_path('images'), $nomeImagem);
            $dados['image'] = $nomeImagem;
        }

        if ($id) {
            $registro = Site::findOrFail($id);
            $registro->update($dados);
            $mensagem = 'Registro atualizado com sucesso!';
        } else {
            $registro = Site::updateOrcreate($dados);
            $mensagem = 'Registro criado com sucesso!';
        }

        return redirect()->route('dashboard.gerenciar')->with('success', $mensagem);
    }
}
