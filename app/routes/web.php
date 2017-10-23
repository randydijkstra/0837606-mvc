<?php

use Illuminate\Http\Request;
use App\Post;
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


    //Profile
    Route::get('/profile', 'UserProfileController@index');
    Route::get('/profile/{id}', ['as' => 'profile', 'uses' => 'UserProfileController@show', function ($id) {}]);
    Route::get('/profile/{id}/edit', ['as' => 'profile', 'uses' => 'UserProfileController@edit', function ($id) {}]);

    //Posts
    Route::get('/posts', 'PostController@index');
    Route::get('/post/{id}', ['as' => 'post', 'uses' => 'PostController@show', function ($id) {}]);
    Route::get('/post/create', 'PostController@create');
    Route::post('/post', function (Request $request) {
      $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
        'message' => 'required|max:255',
      ]);

    if ($validator->fails()) {
      return redirect('/')
        ->withInput()
        ->withErrors($validator);
    }

    $post = new Post;
    $post->title = $request->title;
    $post->message = $request->message;
    $post->user_id = Auth::user()->id;
    $post->save();

    return redirect('/posts');
});

});
