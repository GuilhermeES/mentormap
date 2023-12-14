<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoMail;

class ContatoController extends Controller
{
    public function enviarEmail(Request $request)
    {

        $dados = $request->validate([   
            'nome' => 'required|string',
            'email' => 'required|email|string',
            'telefone' => 'required|string',
            'mensagem' => 'required|string',
        ],[
            'nome.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'mensagem.required' => 'O campo mensagem é obrigatório.',
        ]);

        // Envie o e-mail
        Mail::to('guilhermestevao123@gmail.com')->send(new ContatoMail($dados));

        // Redirecione ou retorne uma resposta de sucesso
        return redirect()->back()->with('success', 'E-mail enviado com sucesso!')->with('anchor', '#contato');

    }
}
