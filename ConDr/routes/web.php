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
    return View::make('welcome');
});


Route::get('/', 'PostsController@index');

Route::get('/euri', 'PostsController@euri');

Route::get('/euri/{name}', 'PostsController@euri_name');

Route::get('/produse', 'PostsController@produse');

Route::get('/produse/{name}', 'PostsController@produse_name')->name('/produse/{name}');

Route::get('/contact', ['as' => 'contact', 'uses' => 'PostsController@getContact']);

Route::post('contact', ['as' => 'contact_form', 'uses' => 'PostsController@postContact']);

Route::get('/adauga', 'PostsController@adauga');

Route::get('/profil', 'PostsController@profil');

Route::get('/setari', 'PostsController@setari');

Route::get('/login', 'PostsController@login');

Route::get('/inregistrare', 'PostsController@login_register');

Route::get('/schimbare_parola', 'PostsController@login_password');
