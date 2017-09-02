@extends('layouts.app_interno')
@section('content_interno')

<h4>Relatório de Vendas</h4>
<br>
<?php

$dt_inicio = [
    'field' => 'periodo_inicial', 'label' => 'Período Inicial', 'errors' => $errors,
    'value' => request('periodo_inicial'),
    'atributos' => ['class' => 'dateBr']
];
$dt_final = [
    'field' => 'periodo_final', 'label' => 'Período Final', 'errors' => $errors,
    'value' => request('periodo_final'),
    'atributos' => ['class' => 'dateBr']
];
$formas_pg=[""=>'-Todos-','1'=>'Dinheiro','2'=>'Cartão'];
use App\Helpers\Util;
?>
{!! Form::open(['route'=>'relatorio.index','id'=>'form-relatorio'])!!}

<div class="row">
    <div class="col-md-3">
        {!! Form::listMultiple(['produto_id[]'=>'Produto'],$produtos,request('produto_id'),['class'=>'meu_chosen','data-placeholder'=>'-Todos-']) !!}
    </div>
    <div class="col-md-2">
        {!! Form::listMultiple(['cliente_id[]'=>'Cliente'],$clientes,request('cliente_id'),['class'=>'meu_chosen','data-placeholder'=>'-Todos-']) !!}
    </div>
    <div class="col-md-2">
        {!! Html::formGroupFlex($dt_inicio) !!}
    </div>
    <div class="col-md-2">
        {!! Html::formGroupFlex($dt_final) !!}
    </div>
    <div class="col-md-2">
        {!! Form::list(['forma_pagamento'=>'Forma Pagamento'],$formas_pg,request('forma_pagamento')) !!}
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label class="control-label">Buscar</label>
        <button type="submit" class="btn   btn-primary form-control"><span class="glyphicon glyphicon-play"></span></button>
        </div>

    </div>
</div>



{!! Form::close() !!}
@if($relatorio->items)
<span class="text-primary"><b>Mostrando {{$relatorio->items->count()}} Registro(s)</b></span>

@endif
<div class="pull-right">
    <button class="btn"> Total Venda: {{Util::moneyToBr($relatorio->total_venda)}}</button>
    <button class="btn"> Total Lucro: {{Util::moneyToBr($relatorio->total_lucro)}}</button>
</div>
<table class="table table-striped table-bordered">
    <thead>
    <th>Data</th>
    <th>Cliente</th>
    <th>Produto</th>
    <th>Vl compra</th>
    <th>Vl venda</th>
    <th>Qtd</th>
    <th>Total Venda</th>
    <th>Lucro</th>
    <th>Pagamento</th>
</thead>

<tbody>
    @foreach($relatorio->items as $item)
    <tr>
        <td>{{$item->data->format('d\/m\/Y')}}</td>
        <td>{{$item->cliente->nome}}</td>
        <td>{{$item->produto->descricao}}</td>
        <td>{{$item->moneyToBr('valor_compra')}}</td>
        <td>{{$item->moneyToBr('valor_venda')}}</td>
        <td>{{$item->qtd}}</td>
        <td>{{$item->moneyToBr('total_venda')}}</td>
        <td>{{$item->moneyToBr('lucro')}}</td>
         <td>{{$item->nome_forma_pagamento}}</td>
    </tr>


    @endforeach

</tbody>



</table>
@endsection
