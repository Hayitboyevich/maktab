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
Route::resource('posts', 'PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post', 'PostController@post');
Route::get('/view/{id}', 'PostController@view');
Route::get('/edit/{id}', 'PostController@edit');
Route::post('/editpost/{id}', 'PostController@editpost');
Route::post('/addpost', 'PostController@addpost');
Route::get('/delete/{id}', 'PostController@delete');
Route::get('/category/{id}', 'PostController@category');
Route::get('/like/{id}', 'PostController@like');
Route::get('/dislike/{id}', 'PostController@dislike');
Route::post('/comment/{id}', 'PostController@comment');
Route::get('/profile', 'ProfileController@profile');
Route::post('/add_profile', 'ProfileController@profile_store');
Route::get('/addcategory', 'CategoryController@category');
Route::post('/store', 'CategoryController@category_store');
Route::post('/search', 'PostController@search');

