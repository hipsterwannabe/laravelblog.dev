@extends('layouts.master')

@section('content')

<div class="container">
	<a href="/posts/$post->id"><h1>{{{ $post->title }}}</h1></a>
	<br>
	<h5>{{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}}</h5>
	{{ $post->renderBody() }}
	@if ($post->img_path)
	    <img src="{{{ $post->img_path }}}" class="img-responsive">
	@endif
	{{{ $post->email }}}
	{{ Form::open(array('action'=> array('PostsController@destroy', $post->id), 'method' => 'DELETE' )) }}
	    {{ Form::submit('Delete') }}
	{{ Form::close() }}
</div>
@stop