@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
  {!!Form::open(['url' => '/categories/'.$category->id,'method' => 'PATCH', 'class' => 'inline-block']) !!}

    Nombre del producto:
    {{  Form::text('name',$category->name,['class'=>'form-control'])  }}
    Descripción del producto:
    {{  Form::textarea('description',$category->description,['class'=>'form-control'])  }}
    <br><br>


  <input type="submit"  class="btn btn-success" value="Guardar">
  {!! Form::close() !!}
@endif
@endsection
