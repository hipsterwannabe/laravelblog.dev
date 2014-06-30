@extends('layouts.master')

@section('content')

@foreach ($posts as $post)
			{{{ $post->title }}}
			<br>
			{{{ $post->body  }}}
			<br>
@endforeach

@stop