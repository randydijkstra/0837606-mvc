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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    //Home
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', function(){
      return redirect()->route('home');
    });

    //Admin panel
    Route::get('/admin', function(){
      if (Auth::user()->hasRole('admin')){
        return view('admin/index');
      }else{
        return redirect()->route('home')->withError("Un-Authorise access");
      }
    });
    Route::get('/admin/users', 'AdminController@adminUsers')->name('admin.users');
    Route::get('/admin/posts', 'AdminController@adminPosts')->name('admin.posts');


    //Profile
    Route::post('/profile/edit', 'UserProfileController@edit');
    Route::post('/profile/{id}/edit', 'UserProfileController@edit');

    Route::get('/profile', 'UserProfileController@index');
    Route::get('/profile/edit', function () {
      return view('profile/edit');
    });
    Route::get('/profile/{id}/edit', ['as' => 'profile', 'uses' => 'UserProfileController@edit', function ($id) {}]);

    Route::get('/profile/{id}', ['as' => 'profile', 'uses' => 'UserProfileController@show', function ($id) {}]);


    //Users
    Route::get('/user/{id}/posts', [ 'as' => 'user.posts', 'uses' => 'PostController@userPosts', function ($id) {}]);
    Route::get('/user/{id}/edit');
    Route::get('/user/delete/{id}', 'UserProfileController@delete')->name('user.delete');
    Route::get('/user/{id}');


    //Posts
    Route::post('/post/new', 'PostController@create')->name('post.create');


    Route::post('/post/{id}/edit', 'PostController@edit')->name('post.edit');
    Route::get('/post/active/{id}', 'PostController@postStatus')->name('post.active');
    Route::get('/post/delete/{id}', 'PostController@delete')->name('post.delete');
    Route::get('/posts', 'PostController@index');
    Route::get('/post/new', function () {
      return view('post/create');
    });
    // Route::get('/post/{id}/edit', function () {
    //   return view('post/edit');
    // });
    Route::get('/post/{id}/edit', ['as' => 'post.edit', 'uses' => 'PostController@edit', function ($id) {}]);
    Route::get('/post/{id}', ['as' => 'post', 'uses' => 'PostController@show', function ($id) {}]);
});
