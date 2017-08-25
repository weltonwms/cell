<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relatorio;

class RelatorioController extends Controller
{
    public function index()
    {
        $relatorio=new Relatorio();
         $dados = [

            'clientes' => \App\Cliente::pluck('nome', 'id'),
            'produtos' => \App\Produto::pluck('descricao', 'id'),
             'relatorio'=> $relatorio->getRelatorio(),
            
        ];
        return view("relatorios.index",$dados);
    }
    
    public function consultar(Request $request)
    {
        $dados = [

            'clientes' => \App\Cliente::pluck('nome', 'id'),
            'produtos' => \App\Produto::pluck('descricao', 'id'),
            
        ];
        return view("relatorios.index",$dados);
    }
}
