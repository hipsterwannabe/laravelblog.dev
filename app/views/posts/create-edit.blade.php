@extends('layouts.master')

@section('content')
    
    @if (isset($post))
        <h2>Edit Post</h2>
        {{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'PUT', 'files'=>true)) }}
    @else
        <h2>Create a New Post</h2>
        {{ Form::open(array('action'=>'PostsController@store', 'files'=>true)) }}
    @endif
    
        <div>
        {{ Form::label('title', 'Title') }}<br>
        {{ Form::text('title') }} <br>
        {{ $errors->first('title', '<span class="help-block">:message</span>') }}<br>
        </div>
        <div>
           <!--  image upload form here -->
        {{ Form::label('image', 'Upload Image') }}
        {{ Form::file('image') }}

        </div>
        <div>
        {{ Form::label('body', 'Body')}}<br>
        {{ Form::textarea('body')}}<br>
        {{ $errors->first('body', '<span class="help-block">:message</span>') }}<br>
        </div>
        {{ Form::submit('SUBMIT') }}
    {{ Form::close() }}

@stop