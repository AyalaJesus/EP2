@extends('layouts.app')
@section('content')
<img class="video-container" src="{{ asset('images/fondo3.jpg') }}">
<div class="container">
  <div class="col-md-4">
  @foreach ($order_products as $order_products)
    <h2>{{$order_products->id}}</h2>
    <h2>{{$order_products->order_id}}</h2>
      <h2>{{$order_products->product_id}}</h2>
        <h2>{{$order_products->qty}}</h2>


          {!!Form::close()!!}
            
  @endforeach
  </p><br>
  </div>
</div>
@endsection
