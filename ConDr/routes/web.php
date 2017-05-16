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

Route::get('/data', 'TestController@test');

Route::get('/', 'PostsController@index');

Route::get('/euri', 'PostsController@euri');

Route::get('/produse', 'PostsController@produse');

Route::get('/contact', 'PostsController@contact');

Route::get('/adauga', 'PostsController@adauga');
