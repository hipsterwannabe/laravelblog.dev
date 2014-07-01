@extends('layouts.master')

@section('content')
    <h2>Create a New Post</h2>
    @if ($errors->has('title'))
        {{ $errors->first('title', '<span class="help-block">:message</span') }}
    @endif 
    @if ($errors->has('body'))
        {{ $errors->first('body', '<span class="help-block">:message</span') }}
    @endif 
    <form method='POST' action="{{{ action('PostsController@store') }}}">
            <label for "title">Post Title</label>
            <input id="title" name="title" type="text" value="{{{ Input::old('title') }}}">
        
        <br>
            <label for "body">Body</label>
            <textarea id="body" name="body"class="form-control" rows="3">{{{ Input::old('body') }}}</textarea>
        <br>
        <input type='SUBMIT'></input>
    </form> 

@stop