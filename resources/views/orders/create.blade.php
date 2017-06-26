@extends('layouts.app')
@section('content')
{!!Form::open(['url'=>'/orders/','method'=>'POST', 'class'=>'inline-block'])!!}


<div class="container">

  <div class="col-md-4">

    <div class="col-xs-12">
      <label>Id</label>
      {{  Form::number('user_id', Auth::user()->id,['class'=>'form-control','readonly'])  }}
      <h2>Tu lista</h2>
      @foreach($shopping_cart as $product)
      {{$product->name}} ${{$product->price}}
      @endforeach

    </div>
    <div class="col-xs-12">
      número de productos {{$productsSize}}<br><br>
      <label>Subtotal:</label>
      {{$total}}<br>
      <label>Total  más iva incluido:</label>
      {{$total*1.1}}
      <br><br><label>Estado</label>
      {{  Form::text('status', 'Pendiente',['class'=>'form-control','readonly'])  }}
    </div>
  </div>
  <div class="col-xs-10"><br><br>
    <input type="submit" class="col-xs-12 btn btn-success" name="" value="Confirmar pedido">
    <center><a type="submit" class="col-xs-12 btn btn-default" href="{{url('/products')}}">Volver</a><br>
  </div>
  </div>
</div>



{!!Form::close()!!}


@endsection
