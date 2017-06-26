@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
  {!!Form::open(['url' => '/orders/'.$order->id,'method' => 'PATCH', 'class' => 'inline-block']) !!}

    Id pedido:
    {{  Form::text('id',$order->id,['class'=>'form-control','readonly'])  }}
    Id usuario:
    {{  Form::text('user_id',$order->user_id,['class'=>'form-control','readonly'])  }}
    Estatus:
    {{  Form::select('status', ['Pendiente', 'Completado'],['class'=>'form-control']) }}
    <br><br>
  <input type="submit"  class="btn btn-success" value="Guardar">
  {!! Form::close() !!}
@endif
@endsection
