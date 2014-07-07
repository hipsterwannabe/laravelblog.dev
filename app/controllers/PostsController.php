<?php

class PostsController extends \BaseController {

    public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();

	    // run auth filter before all methods on this controller except index and show
	    $this->beforeFilter('auth', array('except' => array('index', 'show')));
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$posts = Post::with('user')->get();
		$search = Input::get('search');
	    //search form isset
		if (isset($search))
		{
			//retrieve and display matching posts with pagination
			$posts = Post::where("title", "LIKE", "%$search%")->orderBy('created_at', 'desc')->paginate(4);
			return View::make('posts.index')->with('posts', $posts);
		} else
		{
			//display all posts with pagination
			$posts = Post::orderBy('created_at', 'desc')->paginate(4);
			return View::make('posts.index')->with('posts', $posts);
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('posts.create-edit');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    //CHALLENGE: combine create and edit views	
		$validator = Validator::make(Input::all(), Post::$rules);

		if ($validator->fails())
		{
			//show error message
		}
        return $this->update(null);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
		return View::make('posts.show')->with('post',$post);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        //retrieve post by id
		$post = Post::findOrFail($id);
        //returns view with the make method
        return View::make('posts.create-edit')->with('post',$post);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $validator = Validator::make(Input::all(), Post::$rules);

        if ($validator->fails())
        {
            Session::flash('errorMessage', 'There were errors with your update.');
            return Redirect::back()->withInput()->withErrors($validator);
        }
        else
        {
            $post = new Post;
            $post->user_id = Auth::user()->id;
            $post->title = Input::get('title');
            $post->body = Input::get('body');
            $post->save();
            Session::flash('successMessage', 'There were no errors with your update.');
            return Redirect::action('PostsController@index');
        }  
        
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$post->delete();
		Session::flash('successMessage', 'Post deleted successfully');
		return Redirect::action('PostsController@index');
	}


}
