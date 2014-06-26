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
	return View::make('temp.my-first-view');
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

Route::get('/sayhello/{name}', function($name)
{
    if ($name === "Greg")
    {
        return Redirect::to('/');
    }

    return View::make('my-first-view')->with('name', $name);
});


// Create a route that responds to a GET request on the path /rolldice.
// Within the route, return a random number between 1 and 6.
// Add a view named roll-dice.php. Instead of just returning the random number, show the view and have it display the random number.
// Modify the route to take in a parameter named guess. Someone will access the route by visiting http://blog.dev/rolldice/1, where 1 is their guess.
// Modify the route and view so that you can display the guess in addition to the roll and also tell if the guess matches the roll.

Route::get('/rolldice/{guess}', function($guess){
	$random = rand(1,6);
	$data = array(
		'random'=>$random,
		'guess'=>$guess
	);
	
	return View::make('temp.roll-dice')->with($data);
		
});
