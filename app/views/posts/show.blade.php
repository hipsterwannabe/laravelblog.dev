@extends('layouts.master')

@section('content')

	<h1>{{{ $post->title }}}</h1>
	<br>
	<h5>{{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}}</h5>
	{{{ $post->body }}}
		
	{{ Form::open(array('action'=> array('PostsController@destroy', $post->id), 'method' => 'DELETE' )) }}
	    {{ Form::submit('Delete') }}
	{{ Form::close() }}
@stop