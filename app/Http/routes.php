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

$router->controller('contacts', 'ContactController');

$router->resource('categories', 'CategoryController', ['only' => ['index', 'show', 'edit', 'update', 'destroy', 'store', 'create']]);

