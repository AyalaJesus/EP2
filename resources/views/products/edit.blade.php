@extends('layouts.app')
@section('content')
<!-- Form -->
@if( Auth::user()->admin())

  {!!Form::open(['url' => '/products/'.$product->id, 'method' => 'PATCH', 'class' => 'inline-block', 'files' => true])!!}
  Imagen del producto:
  {!! Form::file('image') !!}

  Nombre del producto:
  {{Form::text('name',$product->name,['class'=>'form-control'])}}

  Descripción del producto:
  {{Form::textarea('description',$product->description,['class'=>'form-control'])}}

  Precio del producto:
  {{Form::text('price',$product->price,['class'=>'form-control'])}}

  Categoría del producto:
  {{
    Form::select('category_id',$categories,['class'=>'form-control'])
  }}
  <br>
  <input type="submit" class="btn btn-success" name="" value="Guardar">
  {!!Form::close()!!}
  @endif
  @if(!Auth::user()->admin())
  <a type="submit" class="col-xs-12 btn btn-warning" href="{{url('/products')}}">
    Continuar
  </a>
  @endif

@endsection
