<?php

class Post extends BaseModel {
    //The db table this model relates to
    protected $table = 'posts';
    //new global property
    protected $imgDir = 'img-upload';

    //Validation rules for our model properties
    static public $rules = [
    	'title' => 'required|max:100',
        'body' => 'required|min:10|max:10000'
    ];
    
    public function user()
    {
        return $this->belongsTo('User');
    }
    public function addUploadedImage($image)
    {
        $systemPath = public_path() . "/" . $this->imgDir . "/";
        $imageName = $this->id . "-" . $image->getClientOriginalName();
        $image->move($systemPath, $imageName);
        $this->img_path = "/" . $this->imgDir . "/" . $imageName;
    }

}