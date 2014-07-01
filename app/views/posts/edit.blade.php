@extends('layouts.master')

@section('content')

<h2>Edit A Previous Post</h2>
<!-- form that retreives previous info, and populates it into form -->
{{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'PUT')) }}
    <br>
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title') }}
    <br>

    {{ Form::label('body', 'Body')}}
    {{ Form::textarea('body')}}
        
    <br>
    {{ Form::submit('SUBMIT'); }}
{{ Form::close() }}

@stop