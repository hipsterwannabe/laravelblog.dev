@extends('layouts.master')

@section('content')
    <h2>Create a New Post</h2>
    @if ($errors->has('title'))
        {{ $errors->first('title', '<span class="help-block">:message</span') }}
    @endif 
    @if ($errors->has('body'))
        {{ $errors->first('body', '<span class="help-block">:message</span') }}
    @endif 
    {{ Form::open(array('action'=>'PostsController@store')) }}
        <br>
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title') }}
        <br>

        {{ Form::label('body', 'Body')}}
        {{ Form::textarea('body')}}
            
        <br>
        <input type='SUBMIT'></input>
    {{ Form::close() }}

@stop