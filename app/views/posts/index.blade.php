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
<!--search field-->
<div>
<h3>Search Blog Posts By Ttitle</h3>
    {{ Form::open(array('action' => 'PostsController@index', 'method' => 'GET' )) }}
    <div class="form-group">
        {{ Form::text('search', null, array('placeholder' => 'Search Query' )) }}
        {{ Form::submit('Search') }}
    </div>
    {{ Form::close() }}

</div>
{{ $posts->links() }}
@stop