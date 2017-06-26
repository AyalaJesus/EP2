<!-- Form -->
@if(Auth::user()->admin())
{!!Form::open(['url' => '/orders/'.$order->id, 'method' => 'DELETE', 'class' => 'inline-block'])!!}
<input type="submit" class="btn btn-link red-text no-padding no-margin no-transform" name="" value="DELETE">
{!!Form::close()!!}
@endif
