@extends('layouts.app')
@section('content')
<!-- Form -->
<img class="video-container" src="{{ asset('images/fondo3.jpg') }}">
@if(Auth::user()->admin())
  {!!Form::open(['url' => '/products/', 'method' => 'POST', 'class' => 'well well-lg'])!!}

  Nombre del producto:
  {{Form::text('name','',['class'=>'form-control'])}}

  Descripción del producto:
  {{Form::textarea('description','',['class'=>'form-control'])}}

  Precio del producto:
  {{Form::text('price','',['class'=>'form-control'])}}

  Categoría del producto:
  {{
    Form::select('category_id',$categories,['class'=>'form-control'])
  }}
  <br>
  <input type="submit" class="btn btn-raised btn-primary" name="" value="Agregar">
  {!!Form::close()!!}
  @endif

  @if(!Auth::user()->admin())
  <img src="{{asset('/images/acceso/denegado.png')}}" alt="permiso restringido">
  <a type="submit" class="btn btn-raised btn-info" href="{{url('/products')}}">
    Continuar
  </a>
  @endif

@endsection
