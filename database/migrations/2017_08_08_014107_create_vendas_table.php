<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
	    $table->date('data');
	    $table->integer('cliente_id')->unsigned();
            $table->integer('produto_id')->unsigned();
	    $table->decimal('valor_compra', 10, 2);
	    $table->decimal('valor_venda', 10, 2);
	    $table->integer('qtd');
	    $table->string('observacao')->nullable();
            $table->timestamps();
	    $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
