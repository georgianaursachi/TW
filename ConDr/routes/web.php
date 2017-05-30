<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/data', 'TestController@test');

//Enumber route

Route::get('/euri', 'PostsController@euri');

//

Route::get('/euri/{name}', 'PostsController@euri_name');

//Products route

Route::get('/produse', 'PostsController@produse');

//Contact route

Route::get('/contact', 'PostsController@contact');

//Add product route

Route::get('/adauga', 'PostsController@adauga');

//Profile route

Route::get('/profil', 'PostsController@profil');

Route::post('/profil', 'PostsController@update_avatar');

//Settings route

Route::get('/setari', 'PostsController@setari');

//Authentication route

Route::get('auth/login', 'Auth\LoginController@showLoginForm');

Route::post('auth/login', 'Auth\LoginController@login');

Route::get('auth/logout', 'Auth\LoginController@logout');

Route::post('auth/logout', 'Auth\LoginController@logout');

//Registration routes

Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');

Route::post('auth/register', 'Auth\RegisterController@register');

//Reset password routes

Route::get('passwords/reset_password', 'Auth\ForgotPasswordController@showLinkRequestForm');

Route::post('passwords/reset_password', 'Auth\ForgotPasswordController@sendResetLinkEmail');

//Home route

Route::get('/', 'HomeController@index')->name('index');

