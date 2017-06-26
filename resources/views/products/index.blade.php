@extends('layouts.app')
@section('content')
<img class="video-container" src="{{ asset('images/fondo3.jpg') }}">
<div class="container">

  @foreach($products as $product)
  <div class="panel panel-danger" align="center">
    <div class="panel-heading">
      <h3>{{$product->name}}</h3>
    </div>
    <div class="panel-body">
      <img style="height:150px;" class="col-xs-18" src="/images/products/{{$product->image}}" alt="img-responsive">
    <p>{{$product->description}}</p>
    <p>{{$product->price}}</p>
    {!!Form::open(['url'=>'/shopping_carts/','method'=>'POST','class'=>'inline-block'])!!}
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <input type="hidden" name="product_name" value="{{$product->name}}">
    <input type="hidden" name="product_price" value="{{$product->price}}">
    <input type="hidden" name="product_description" value="{{$product->description}}">

    @if( Auth::user()->customer())
    <label>Cantidad</label>
    <input type="number" name="qty" value="" required>
    <input type="submit" class="btn btn-raised btn-success" name="" value="Agregar al carrito">
    @endif
    @if( Auth::user()->admin())
      <a type="submit" class="btn btn-raised btn-warning" href="{{url('/products/'.$product->id.'/edit')}}">Editar</a>
      <a type="submit" onclick ="eliminarProducto({{$product->id}})" class="btn btn-raised btn-danger">Eliminar</a>
    @endif
    {!! Form::close() !!}

    </div>
  </div>
  @endforeach

  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Listas de articulos</h4>
        </div>
        <div class="modal-body">
          <p>
            @if( Auth::user()->customer())
            <div class="col-xs-12">
              @foreach($shopping_cart as $product)
              {{$product->name}} ${{$product->price}}
              <br>
              @endforeach
            </div>
            <div class="col-xs-12">
              número de productos {{$productsSize}}
              total a pagar:{{$total}}
            </div>
            @endif
          </p>
        </div>
        <center><a type="submit" class="col-xs-12 btn btn-default" href="{{url('/orders/create')}}">Confirmar pedido</a><br>
          <a type="submit" class="col-xs-12 btn btn-default" data-dismiss="modal">Close</a></center>
        <div class="modal-footer"></div>
      </div>

    </div>
  </div>
</div>

  <div class="col-xs-12" style="text-align:center">
    {{$products->links()}}
  </div>
@endsection
