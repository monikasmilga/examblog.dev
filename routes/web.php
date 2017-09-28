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

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'user-check']], function () {

    Route::get('/posts', ['as' => 'app.posts.create', 'uses' => 'DBPostsController@create']);

    Route::post('/posts', ['as' => 'app.post.store', 'uses' => 'DBPostsController@store']);

});
