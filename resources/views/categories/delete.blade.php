{!!Form::open(['url' => '/categories/'.$category->id, 'method' => 'DELETE', 'class' => 'inline-block']) !!}
<input type="submit" class="btn btn-raised btn-danger" name="" value="DELETE">
{!! Form::close() !!}
