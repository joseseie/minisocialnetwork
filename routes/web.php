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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/profile}','ProfileController@profile');

Route::get('/listagem/index', 'ArticlesController@table');

//Route::resource('articles','ArticlesController');

Route::resource('mail','MailController');
//Route::get('mail','MailController');

