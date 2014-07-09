@extends('layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="/bootstrap/css/demo.css"/>
@stop

@section('top-script')
<script type="text/javascript" src="/bootstrap/js/Markdown.Converter.js"></script>
<script type="text/javascript" src="/bootstrap/js/Markdown.Sanitizer.js"></script>
<script type="text/javascript" src="/bootstrap/js/Markdown.Editor.js"></script>
@stop


@section('content')
    @if (isset($post))
        <h2>Edit Post</h2>
        {{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'PUT', 'files'=>true, 'class'=>'form-control wmd-input', 'required', 'id'=>'wmd-input')) }}
    @else
        <h2>Create a New Post</h2>
        {{ Form::open(array('action'=>'PostsController@store', 'files'=>true, 'class'=>'form-control wmd-input', 'required', 'id'=>'wmd-input')) }}
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
            <br>
                <textarea class="wmd-input" id="wmd-input"></textarea>
                {{ $errors->first('body', '<span class="help-block">:message</span>') }}
            </div>
        <div class="wmd-panel">
        <div id="wmd-button-bar"></div>
        {{ Form::label('body', 'Body') }}
        {{ Form::submit('SUBMIT') }}
    {{ Form::close() }} 
    </div>

    <div id="wmd-preview" class="wmd-panel wmd-preview"></div>

@stop
        
@yield('bottomscript')

    <script type="text/javascript">
       (function () {
            var converter1 = Markdown.getSanitizingConverter();
            
            var editor1 = new Markdown.Editor(converter1);
            
            editor1.run();
            
        })();
   </script>
@stop
