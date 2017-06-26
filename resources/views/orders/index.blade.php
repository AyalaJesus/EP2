@extends('layouts.app')
@section('content')
<img class="video-container" src="{{ asset('images/fondo3.jpg') }}">
<div class="container">

  @foreach ($orders as $order)
  <div class="well well-lg">
      <label>Id pedido</label>
      <p>{{$order->id}}</p>
      <label>Id usuario</label>
      <p>{{$order->user_id}}</p>
      <label>Estatus</label>
      <p>{{$order->status}}</p>
      <a type="submit" class="btn btn-raised btn-primary" href="{{url('/orders/'.$order->id.'/edit')}}">Editar</a>
    </div>
  @endforeach
</div>
<div class="col-xs-12" style="text-align:center">
  {{$orders->links()}}
</div>
@endsection
