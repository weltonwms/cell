@extends('layouts.app_interno')

@section('content_interno')
    
        <h3>Editar Cliente</h3>
        {!! Form::model($cliente,['route'=>['clientes.update',$cliente->id],'class'=>'form col-md-8','method'=>'PUT'])!!}
        @include('clientes.form')


        {!! Form::close() !!}


    
@endsection
