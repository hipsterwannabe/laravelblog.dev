@extends('layouts.master')

@section('content')
    The roll of the die came up {{{$random}}} 
    Your guess was a {{{ $guess }}}
  
    {{{ $random == $guess ? 'YOU WIN' : 'YOU LOSE' }}}
@stop