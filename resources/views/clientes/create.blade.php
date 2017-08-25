@extends('layouts.app_interno')
@section('content_interno')

    
        <h3>Novo Cliente</h3>
        {!! Form::open(['route'=>'clientes.store','class'=>'form col-md-8 form-horizontal'])!!}
        @include('clientes.form')


        {!! Form::close() !!}


    
@endsection
