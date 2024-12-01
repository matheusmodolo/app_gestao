<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        $motivo_contato = MotivoContato::all();
        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contato' => $motivo_contato]);
    }
    public function salvar(Request $request)
    {
        // Validação de dados do request

        $regras = [
            'nome' => 'required|min:2|max:100',
            'telefone' => 'required|min:8|max:12',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|min:10',
        ];

        $feedback = [
            'nome.min' => 'O campo Nome precisa ter pelo menos 2 caracteres',
            'nome.max' => 'O campo Nome precisa ter no máximo 100 caracteres',
            'telefone.min' => 'O campo Telefone precisa ter pelo menos 8 caracteres',
            'telefone.max' => 'O campo Telefone precisa ter no máximo 12 caracteres',
            'motivo_contatos_id.required' => 'O Motivo do Contato precisa ser preenchido',
            'mensagem.min' => 'O campo Mensagem precisa ter pelo menos 10 caracteres',

            'required' => 'O campo :attribute precisa ser preenchido',
            'email' => 'O Email precisa ser válido',
        ];

        $request->validate($regras, $feedback);

        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');

        // $contato->fill($request->all());
        // $contato->save();

        // $contato->create($request->all());

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
