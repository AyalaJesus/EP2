@extends('layouts.app')
@section('content')
<div class="container">
  <div class="col-xs-10">
    {!!Form::open(['url' => '/addresses/','method' => 'POST', 'class' => 'inline-block']) !!}

      Calle:
      {{  Form::text('street','',['class'=>'form-control','requerided'])  }}
      Codigo postal:
      {{  Form::text('postcode','',['class'=>'form-control','requerided'])  }}

      Colonia:
      {{  Form::text('neighborhood','',['class'=>'form-control','requerided'])  }}
      Ciudad:
      {{  Form::text('city','',['class'=>'form-control','requerided'])  }}
      <br><br>

    <input type="submit" class="col-xs-12 btn btn-default" value="Guardar">
    <center><a type="submit" class="col-xs-12 btn btn-default" href="{{url('/products')}}">Cancelar</a><br>
  </div>
</div>

  {!! Form::close() !!}

@endsection
