<?php

use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();


Route::group([CheckLogin::class], function () {
    Route::post('/like/{id}', 'LikeController@store');
    Route::post('/follow/{user}', 'FollowsController@store');
});


Route::get('/', 'PostsController@index');

Route::post('/p', 'PostsController@store');

Route::get('/p/create', 'PostsController@create');

Route::get('/p/{post}', 'PostsController@show')->name('post.show');
Route::get('/p/{post}/edit', 'PostsController@edit')->name('post.edit');
Route::patch('/p/{post}', 'PostsController@update')->name('post.update');;

Route::get('/profile/{user}', 'profilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'profilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'profilesController@update')->name('profile.update');

Route::get('/zoeken', 'SearchController@index');
Route::get('/zoeken/{name}', 'SearchController@search');
