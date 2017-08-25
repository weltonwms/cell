@extends('layouts.app_interno')
@section('content_interno')

 <h4>Listagem de Clientes</h4>
 <hr>
<div class="row">
    <a class="btn btn-primary navbar-right" href="{{route('clientes.create')}}">Novo Cliente</a>
</div>
   
    
    
        <table class="tabela table table-striped" id="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                     <th>Endereço</th>
                    <th>Acões</th>
                </tr>
            </thead>

            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->telefone}}</td>
                    <td>{{$cliente->endereco}}</td>
                    <td class="col-md-2">
                        <a class='btn btn-default' href="{{url("clientes/$cliente->id/edit")}}">Editar</a>
			<a class='btn btn-danger confirm' href="{{url("clientes/$cliente->id")}}  " data-info="{{$cliente->nome}}">Excluir</a>
                        
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>





@endsection




