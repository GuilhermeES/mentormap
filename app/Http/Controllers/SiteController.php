<?php

namespace App\Http\Controllers;
use App\Models\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function storeOrUpdate(Request $request, $id = null) {
        $dados = request()->except(['_token']);

        // Manipular a imagem
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $caminhoImagem = $imagem->store('public/images'); // Salva na pasta storage/app/public/images
            $dados['caminho_imagem'] = str_replace('public/', '', $caminhoImagem);
        }

        // Verifica se o ID foi fornecido
        if ($id) {
            // Se o ID foi fornecido, tenta localizar e atualizar o registro existente
            $registro = Site::findOrFail($id);
            $registro->update($dados);
            $mensagem = 'Registro atualizado com sucesso!';
        } else {
            // Se nenhum ID foi fornecido, cria um novo registro
            $registro = Site::updateOrcreate($dados);
            $mensagem = 'Registro criado com sucesso!';
        }

        return redirect()->route('dashboard.gerenciar')->with('success', $mensagem);
    }
}
