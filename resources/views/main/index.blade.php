@extends('layouts.app');

@section('content')
<img class="video-container" src="{{ asset('images/fondo3.jpg') }}">
  <div class="col-xl-12">
    <div class="col-md-6 well">
      <input type="text" name="" value="" class="form-control" placeholder="Qué pasa"><br>
      <div class="col-md-9"></div>
      <div class="">
        <input type="submit" name="" class="btn btn-primary btn-raised" value="Publicar">
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
  @endsection
