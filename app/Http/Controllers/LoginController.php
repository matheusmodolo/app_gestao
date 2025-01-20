<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        $erro = $request->get('erro');

        if ($erro == 1) {
            $erro = 'Usuário e/ou senha não existe';
        }

        if ($erro == 2) {
            $erro = 'Efetue login para ter acesso ao sistema';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {

        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required',
        ];

        $feedback = [
            'usuario.required' => 'O campo usuário é obrigatório',
            'usuario.email' => 'O campo Usuário deve ser um e-mail',
            'senha.required' => 'O campo Senha é obrigatório',
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->first();

        if ($usuario) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

        echo '<pre>';
        print_r($usuario);
        echo '</pre>';
    }
    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}