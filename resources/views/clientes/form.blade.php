{!! Html::formGroup('nome','Nome',$errors) !!}
{!! Html::formGroup('telefone','Telefone',$errors,'telefone') !!}
{!! Html::formGroup('endereco','Endereço',$errors) !!}
{!! Form::submit("Salvar",['class'=>'btn btn-primary']) !!}
<a class="btn btn-default" href="{{route('clientes.index')}}">Cancelar</a>