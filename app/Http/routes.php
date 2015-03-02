<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

$router->resource('games', 'GameController', ['only' => ['index', 'show', 'edit', 'update', 'destroy', 'store', 'create']]);

$router->resource('adds', 'AddController', ['only' => ['index', 'show', 'edit', 'update', 'destroy', 'store', 'create']]);

$router->resource('comments', 'CommentController', ['only' => ['index', 'show', 'edit', 'update', 'destroy', 'store', 'create']]);

$router->resource('categories', 'CategoryController', ['only' => ['index', 'show', 'edit', 'update', 'destroy', 'store', 'create']]);

$router->resource('ratings', 'RatingController', ['only' => ['index', 'show', 'edit', 'update', 'destroy', 'store', 'create']]);

$router->resource('search', 'SearchController', ['only' => ['index', 'show', 'edit', 'update', 'destroy', 'store', 'create']]);

$router->resource('tops', 'TopController', ['only' => ['index']]);

$router->resource('pops', 'PopController', ['only' => ['index']]);

$router->resource('archives', 'ArchiveController', ['only' => ['show']]);

$router->controller('contacts', 'ContactController');



App\Rating::observe(new App\RatingObserver);
App\View::observe(new App\ViewObserver);

$router->get('warning/off', function(){
	
	$response = Response::make('warning off');
	return $response->withCookie(Cookie::forever('warning_off', 1));

});

