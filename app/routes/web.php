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
//     return view('base');
// });

Auth::routes();



Route::group(['middleware' => 'auth'], function () {
    //Home
    Route::get('/', 'HomeController@index')->name('home');

    //Profile
    Route::get('/profile', 'UserProfileController@index');
    Route::get('/profile/{id}', ['as' => 'profile', 'uses' => 'UserProfileController@show', function ($id) {}]);
    Route::get('/profile/{id}/edit', ['as' => 'profile', 'uses' => 'UserProfileController@edit', function ($id) {}]);
});
