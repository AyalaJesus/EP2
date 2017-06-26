@extends('layouts.app')
@section('content')
<img class="video-container" src="{{ asset('images/fondo3.jpg') }}">
<div class="container">
  @foreach ($categories as $category)
  <div class="well col-md-8">

      <label>Nombre</label>
      <p>{{$category->name}}</p>
      <label>Descripción</label>
      <p>{{$category->description}}</p>
      <a type="submit" class="btn btn-raised btn-success" href="{{url('/categories/'.$category->id.'/edit')}}">Editar</a>
      @include('categories.delete',['category'=>$category])
    </div>
  @endforeach
</div>
<div class="col-xs-12" style="text-align:center">
  {{$categories->links()}}
</div>
@endsection
