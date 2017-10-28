<?php

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\UserProfile;
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
//     return view('base');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    //Home
    Route::get('/', 'HomeController@index')->name('home');

    //Admin panel
    Route::get('/users');


    //Profile
    Route::post('/profile/edit', 'UserProfileController@edit');

    Route::get('/profile', 'UserProfileController@index');
    Route::get('/profile/edit', function () {
      return view('profile/edit');
    });
    Route::get('/profile/{id}', ['as' => 'profile', 'uses' => 'UserProfileController@show', function ($id) {}]);


    //Users
    Route::get('/user/{id}/posts',  ['as' => 'userPosts', 'uses' => 'PostController@userPosts', function ($id) {}]);
    Route::get('/user/{id}/edit');
    Route::get('/user/{id}');


    //Posts
    Route::post('/post/new', 'PostController@create')->name('post.create');

    Route::get('/posts', 'PostController@index');
    Route::get('/post/new', function () {
      return view('post/create');
    });

    Route::get('/post/{id}/edit', 'PostController@edit');
    Route::get('/post/{id}', ['as' => 'post', 'uses' => 'PostController@show', function ($id) {}]);
});
