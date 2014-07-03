<?php

class Post extends BaseModel {
    //The db table this model relates to
    protected $table = 'posts';

    //Validation rules for our model properties
    static public $rules = [
    	'title' => 'required|max:100',
        'body' => 'required|min:10|max:10000'
    ];

}