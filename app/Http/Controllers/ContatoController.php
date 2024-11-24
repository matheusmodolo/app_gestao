<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contato = MotivoContato::all();
        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contato' => $motivo_contato]);
    }
    public function salvar(Request $request){
        // Validação de dados do request
        $request->validate([
            'nome' => 'required|min:2|max:100',
            'telefone' => 'required|min:8|max:12',
            'email' => 'required|email',
            'motivo_contato' => 'required',
            'mensagem' => 'required'
        ]);

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
    }
}
