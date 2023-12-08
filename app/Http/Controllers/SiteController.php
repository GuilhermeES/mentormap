<?php

namespace App\Http\Controllers;
use App\Models\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function storeOrUpdate(Request $request, $id = null) {
        $dados = request()->except(['_token']);
        
        // Verifica se há um arquivo de imagem na requisição
        if (request()->hasFile('image')) {
            // Obtém o arquivo de imagem
            $imagem = request()->file('image');

            // Define um nome único para a imagem usando o timestamp
            $nomeImagem = time() . '_' . $imagem->getClientOriginalName();

            // Move a imagem para o diretório public/images
            $imagem->move(public_path('images'), $nomeImagem);

            // Adiciona o nome da imagem aos dados que serão salvos no banco de dados
            $dados['image'] = $nomeImagem;
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
