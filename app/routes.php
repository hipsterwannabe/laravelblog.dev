<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
// sample routes
Route::get('/', function(){
	return 'we are home';
});

// Route::get('/sayHello/{name}', function($name)
// {
// 	 if ($name == "Greg")
//     {
//         return Redirect::to('/');
//     }
//     else
//     {
//         return "Hello, $name!";
//     }
// });

Route::get('/resume', function(){
	return 'resume';
});

Route::get('/portfolio', function(){
	return 'portfolio';
});

