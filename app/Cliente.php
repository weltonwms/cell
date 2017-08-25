<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable=['nome','telefone','endereco'];
    
    public function vendas()
    {
        return $this->hasMany("App\Venda");
    }
    
     public function verifyAndDelete()
    {
        if($this->vendas->count()){
            \Session::flash('mensagem', ['type' => 'danger', 'conteudo' => "Existe Venda(s) relacionada(s) a este Cliente"]);
            return false;
        }
        return $this->delete();
    }
}
