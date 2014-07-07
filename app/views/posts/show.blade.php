@extends('layouts.master')

@section('content')

<div class="container">
	<h1>{{{ $post->title }}}</h1>
	<br>
	<h5>{{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}}</h5>
	{{{ $post->body }}}
	{{{ $post->email }}}
	{{ Form::open(array('action'=> array('PostsController@destroy', $post->id), 'method' => 'DELETE' )) }}
	    {{ Form::submit('Delete') }}
	{{ Form::close() }}
</div>
@stop