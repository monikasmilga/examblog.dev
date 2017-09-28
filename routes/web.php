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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', ['as' => 'app.home.index', 'uses' => 'HomeController@index']);


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', ['as' => 'app.home.index', 'uses' => 'HomeController@index']);


Route::group(['prefix' => 'user', 'middleware' => ['auth', 'user-check']], function () {

    Route::get('/add-post', ['as' => 'app.post.create', 'uses' => 'EBPostsController@create']);

    Route::post('/add-post', ['as' => 'app.post.store', 'uses' => 'EBPostsController@store']);

    Route::get('/posts', ['as' => 'app.posts.index', 'uses' => 'EBPostsController@index']);

    Route::group(['prefix' => '{id}'], function () {

        Route::get('/', ['as' => 'app.posts.show', 'uses' => 'EBPostsController@show']);

        Route::get('/edit', ['as' => 'app.posts.edit', 'uses' => 'EBPostsController@edit']);

        Route::post('/edit', ['as' => 'app.posts.update', 'uses' => 'EBPostsController@update']);

        Route::get('/delete', ['as' => 'app.posts.destroy', 'uses' => 'EBPostsController@destroy']);

    });
});