<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relatorio;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
       
        
        $relatorio=new Relatorio();
        $result=$request->isMethod('post')?$relatorio->getRelatorio():$relatorio;
         $dados = [

            'clientes' => \App\Cliente::pluck('nome', 'id'),
            'produtos' => \App\Produto::pluck('descricao', 'id'),
             'relatorio'=> $result,
            
        ];
        return view("relatorios.index",$dados);
    }
    
    
}
