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

Route::get('/test', function()
{
    return 'hello world';
});
// the Home page
Route::get('/', 'PagesController@home');
// Notice
Route::get('notices/create/confirm', 'NoticesController@confirm');
Route::resource('notices','NoticesController');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
