@extends('layouts.app_interno')
@section('content_interno')

<h4>Relatório de Vendas</h4>
<br>
<?php
print_r(old('produto_id'));
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
?>
{!! Form::open(['route'=>'relatorio.index','id'=>'form-relatorio'])!!}


<div class="col-md-3">
    {!! Form::listMultiple(['produto_id[]'=>'Produto'],$produtos,request('produto_id'),['class'=>'meu_chosen','data-placeholder'=>'-Todos-']) !!}
</div>
<div class="col-md-3">
    {!! Form::listMultiple(['cliente_id[]'=>'Cliente'],$clientes,request('cliente_id'),['class'=>'meu_chosen','data-placeholder'=>'-Todos-']) !!}
</div>
<div class="col-md-2">
    {!! Html::formGroupFlex($dt_inicio) !!}
</div>
<div class="col-md-2">
    {!! Html::formGroupFlex($dt_final) !!}
</div>
<div class="col-md-2">
    <button type="submit" class="btn  btn-primary">Consultar</button>

</div>
<div class="col-md-3">

</div>
<div class="col-md-3">

</div>



{!! Form::close() !!}
<button class="btn"> Total Venda: {{$relatorio->total_venda}}</button>
<button class="btn"> Total Lucro: {{$relatorio->total_lucro}}</button>
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
</thead>

<tbody>
    @foreach($relatorio->items as $item)
    <tr>
        <td>{{$item->data->format('d\/m\/Y')}}</td>
        <td>{{$item->cliente->nome}}</td>
        <td>{{$item->produto->descricao}}</td>
        <td>{{$item->valor_compra}}</td>
        <td>{{$item->valor_venda}}</td>
        <td>{{$item->qtd}}</td>
        <td>{{$item->total_venda}}</td>
        <td>{{$item->lucro}}</td>
    </tr>


    @endforeach

</tbody>



</table>
@endsection
