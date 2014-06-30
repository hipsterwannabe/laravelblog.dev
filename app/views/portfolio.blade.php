@extends('layouts.master')

@section('content')
 <div class="intro-message" "headline">
  <h2>PORTFOLIO</h2>
  <h4>Some of my programming work during Codeup</h4>
  </div>
	
   <div class="media">
  <a class="pull-left" href="#">
    <img class="media-object" src="img/fizzbuzz.png" alt="Fizzbuzz">
  </a>
  <div class="media-body">
    <h4 class="media-heading">Fizzbuzz</h4>
    A logic exercise.
  </div>
</div>
<div class="media">
  <a class="pull-right" href="#">
    <img class="media-object" src="img/addressbook.png" alt="Address Book">
  </a>
  <div class="media-body">
    <h4 class="media-heading">Address Book</h4>
    An address book application, utilizing MySQL
  </div>
</div>
<div class="row">
  <div class="col-md-3 col-md-offset-3"><h4>PHP Coding Challenge</h4><br>
    A one-night challenge put on by PHPeople Group in June 2014
    <img src="img/phpchallenge.png" alt="Challenge" class="img-circle">
  </div>
  

</div>
@stop