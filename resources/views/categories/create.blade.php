@extends('layouts.app')
@section('content')
	<div class="video-container">
      <video class="video" src="{{ asset('fondos/Coffee-Shot.mp4') }}" autoplay loop="">
     </video>
    </div>
  	<center>
  		<div align="center">
  		{!!Form::open(['url' => '/categories/','method' => 'POST', 'class' => 'well col-md-7']) !!}
   		Nombre del producto:
   		{{  Form::text('name','',['class'=>'form-control'])  }}
   		Descripción del producto:
    	{{  Form::textarea('description','',['class'=>'form-control'])  }}
    	<input type="submit" class="btn btn-raised btn-primary" value="Guardar">
  		{!! Form::close() !!}
  		</div>
  	</center>
@endsection
