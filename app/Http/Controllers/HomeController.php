<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function produtosMaisVendidos()
    {
        $produtos=Dash::getProdutosMaisVendidos();
        $lista['quantidades']=$produtos->pluck('soma_qtd');
        $lista['produtos']=$produtos->pluck('descricao');
       return $lista;
    }
    
    public function produtosMaiorLucro()
    {
        $produtos=Dash::getProdutosMaiorLucro();
        $lista['lucros']=$produtos->pluck('total_lucro');
        $lista['produtos']=$produtos->pluck('descricao');
       return $lista;
    }
}
