<?php

class Post extends Eloquent {
    //The db table this model relates to
    protected $table = 'posts';

    //Validation rules for our model properties
    static public $rules = [
    	'title' => 'required|max:100'
    ];

}