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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', 'PostController@index')->name('posts.index');
Route::get('posts/show/{id}', 'PostController@show')->name('posts.show');

Route::group(['prefix' => 'posts', 'middleware' => 'auth'], function(){
    Route::get('create', 'PostController@create')->name('posts.create');
    Route::post('store', 'PostController@store')->name('posts.store');
    Route::get('edit/{id}', 'PostController@edit')->name('posts.edit');
    Route::post('update/{id}', 'PostController@update')->name('posts.update');
    Route::post('destroy/{id}', 'PostController@destroy')->name('posts.destroy');
});

Route::group(['middleware' => 'auth'], function(){  
    Route::get('show/{id}', 'UserController@show')->name('users.show');
    Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
    Route::post('update/{id}', 'UserController@update')->name('users.update');
    Route::post('destroy/{id}', 'UserController@destroy')->name('users.destroy');
    Route::post('comments/store', 'CommentController@store')->name('comments.store');
    Route::post('requests/store', 'RequestController@store')->name('requests.store');
});

Route::get('tags/show/{id}', 'TagController@show')->name('tags.show');

Route::get('login/twitter', 'Auth\LoginController@redirectToTwitterProvider');
Route::get('login/twitter/callback', 'Auth\LoginController@handleTwitterProviderCallback');

Route::get('/policy', 'PolicyController@index')->name('policy');