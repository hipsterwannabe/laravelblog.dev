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

    public function renderBody()
    {
        // Convert he post body from markdown to HTML using parsedown.
        // Sanitize the converted HTML with HTML Purifier.
        // Return the sanitized result.
        
        // $htmlbody = new Parsedown;
        // $dirty_html = Parsedown->text($htmlbody);
        // $config = HTMLPurifier_Config::createDefault();
        // $purifier = new HTMLPurifier($config);
        // $clean_html = $purifier->purify($dirty_html);
        //todo: use HTML purifier

        $dirty_html = Parsedown::instance()->parse($this->body);
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        return $purifier->purify($dirty_html);
    }
}