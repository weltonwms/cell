<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dash extends Model
{
     public static function getProdutosMaisVendidos()
    {
        return \DB::table("vendas as v")
                ->join('produtos as p', 'p.id', '=', 'v.produto_id')
                ->selectRaw("SUM(v.qtd) as soma_qtd, v.produto_id, p.descricao")
                ->groupBy('v.produto_id')
                ->orderBy('soma_qtd','DESC')
                ->limit(8)
                ->get();
       
    }
    
    public static function getProdutosMaiorLucro()
    {
        return \DB::table(\DB::raw(" (SELECT id, produto_id, valor_compra, valor_venda, qtd, ((valor_venda - valor_compra)*qtd) as lucro FROM vendas ) as v"))
                ->join('produtos as p', 'p.id', '=', 'v.produto_id')
                ->selectRaw("v.produto_id, SUM(v.lucro) as total_lucro, p.descricao")
                ->groupBy('v.produto_id')
                 ->orderBy('total_lucro','DESC')
                ->limit(8)
                ->get();
      
    }
}
