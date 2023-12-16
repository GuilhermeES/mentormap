<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function index () {
        return view('register');
    }

    public function register(Request $request) {

        $data = $request->except('password_confirmation');
        $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nascimento'))->format('Y-m-d');

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'data_nascimento' => 'required|date|date_format:Y-m-d|before_or_equal:today',
            'sexo' => 'required|in:masculino,feminino,outro,prefiro_nao_dizer',
            'cargo' => 'required|string|max:255',
            'password' => 'required|string',
        ],[
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.unique' => 'E-mail já está em uso',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório.',
            'sexo.required' => 'O campo sexo é obrigatório.',
            'sexo.in' => 'A seleção do sexo e inválida',
            'cargo.required' => 'O campo cargo é obrigatório.',
            'password.required' => 'O campo password é obrigatório.',
            'data_nascimento.date_format' => 'Forneça um formato válido. Ex: "00/00/0000',
            'data_nascimento.before_or_equal' => 'O campo data nascimento deve ser uma data anterior ou igual a hoje.',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $user = User::create($data + ['password' => Hash::make($request->input('password'))]);

        if ($user) {
            return redirect('/login')->with('success_register', 'Usuário registrado com sucesso. Faça login para continuar.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Erro ao criar usuário. Tente novamente']);
        }
    }
}
