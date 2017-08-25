<?php

namespace App\Http\Controllers;

use App\Venda;

use App\Http\Requests\VendaRequest;

class VendaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $vendas = Venda::getSearch();
        return view('vendas.index', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = [

            'clientes' => \App\Cliente::pluck('nome', 'id'),
            'produtos' => \App\Produto::pluck('descricao', 'id'),
            'datasetsprodutos' => \App\Produto::getDataSetsProdutos(),
        ];
        return view('vendas.create', $dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendaRequest $request)
    {
        Venda::create($request->all());
        \Session::flash('mensagem', ['type' => 'success', 'conteudo' => trans('messages.actionCreate')]);
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function edit(Venda $venda)
    {
        $dados = [

            'clientes' => \App\Cliente::pluck('nome', 'id'),
            'produtos' => \App\Produto::pluck('descricao', 'id'),
            'datasetsprodutos' => \App\Produto::getDataSetsProdutos(),
            'venda' => $venda,
        ];
        return view('vendas.edit', $dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(VendaRequest $request, Venda $venda)
    {
        $venda->update($request->all());
        \Session::flash('mensagem', ['type' => 'success', 'conteudo' => trans('messages.actionUpdate')]);
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venda $venda)
    {
        $venda->delete();
        \Session::flash('mensagem', ['type' => 'success', 'conteudo' => trans('messages.actionDelete')]);
        return back()->withInput();
    }

}
