<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class ForgetPassword extends Controller
{
    public function index () {
        return view('forget-password');
    }

    public function forgetPasswordPost(Request $request) {

        $request->validate([
            'email' => 'required|email|exists:users,email',
        ],[
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo de e-mail deve ser um endereço de e-mail válido.',
            'email.string' => 'O campo email deve ser uma string.',
            'email.exists' => 'O e-mail informado não está cadastrado.',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
        ]);


        Mail::send("emails.forget-password", ['token' => $token], function ($message) use ($request){
            $message->from('noreply@mentormap.com.br', 'Mentormap'); // Modifique aqui
            $message->to($request->email);
            $message->subject("Resetar senha");
        });

        return redirect()->to(route("recuperar-senha"))
            ->with("success", "Enviamos um link para seu e-mail, use esse link para redefinir a senha .");

    }

    function resetPassword($token) {
        return view('new-password', compact('token'));
    }

    function resetPasswordPost(Request $request){
        
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required',
        ],[
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo de e-mail deve ser um endereço de e-mail válido.',
            'email.string' => 'O campo email deve ser uma string.',
            'email.exists' => 'O e-mail informado não está cadastrado.',
        ]);

       $update =  DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if(!$update) {
            return redirect()->to(route("reset-password"))->with("error", "Inválido");
        }

        User::where("email", $request->email)->update(["password" => Hash::make($request->password)]);

        DB::table("password_reset_tokens")->where(["email" => $request->email])->delete();

        return redirect()->to(route("login"))->with("success", "Senha resetada com sucesso");
    }
}
