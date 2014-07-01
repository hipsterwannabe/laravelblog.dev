@extends('layouts.master')

@section('content')

@foreach ($posts as $post)
			{{{ $post->title }}}
			<br>
			{{{ $post->body  }}}
			<br>
			{{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}}
			<br>
			<a href={{ action('PostsController@edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
			<hr>
@endforeach

{{ $posts->links() }}
@stop