<?php

namespace App\Http\Controllers;

use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::orderBy('updated_at', 'desc')->paginate(10);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras = [
            'nome' => 'required|min:3|max:100',
            'descricao' => 'required|min:3|max:255',
            'peso' => 'required|numeric|min:0',
            'unidade_id' => 'exists:unidades,id'
        ];

        $feedback = [
            'required' => 'O campo "' . ucfirst(':attribute') . '" deve ser preenchido',
            'nome.min' => 'O campo "Nome" deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo "Nome" deve ter no máximo 100 caracteres',
            'descricao.min' => 'O campo "Descrição" deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo "Descrição" deve ter no máximo 255 caracteres',
            'peso.numeric' => 'O campo "Peso" deve ser numérico',
            'unidade_id.exists' => 'A unidade de medida informada não existe'
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
        // return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|min:3|max:100',
            'descricao' => 'required|min:3|max:255',
            'peso' => 'required|numeric|min:0',
            'unidade_id' => 'exists:unidades,id'
        ];

        $feedback = [
            'required' => 'O campo "' . ucfirst(':attribute') . '" deve ser preenchido',
            'nome.min' => 'O campo "Nome" deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo "Nome" deve ter no.maxcdn 100 caracteres',
            'descricao.min' => 'O campo "Descrição" deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo "Descrição" deve ter no.maxcdn 255 caracteres',
            'peso.numeric' => 'O campo "Peso" deve ser numérico',
            'unidade_id.exists' => 'A unidade de medida informada não existe'
        ];

        $request->validate($regras, $feedback);

        $produto = Produto::find($id);

        $produto->update($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {

        $produto->delete();

        return redirect()->route('produto.index');
    }
}
