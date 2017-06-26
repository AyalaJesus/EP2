<!-- Form -->
@if( Auth::user()->admin())
{!!Form::open(['url' => '/products/'.$product->id, 'method' => 'DELETE', 'class' => 'inline-block'])!!}
<input type="submit" class="btn btn-link red-text no-padding no-margin no-transform" name="" value="DELETE">
{!!Form::close()!!}
@endif
@if(!Auth::user()->admin())
<a type="submit" class="col-xs-12 btn btn-warning" href="{{url('/products')}}">
  Continuar
</a>
@endif
