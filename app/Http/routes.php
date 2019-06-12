<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::auth();

Route::get('/home', 'HomeController@index');

//Route::resource('admin/users','AdminUsersController');

Route::get('/admin',function(){
    return view('admin.index');
});



Route::group(['middleware'=>'admin',],function(){

    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/posts','AdminPostsController');
    Route::resource('admin/categories','AdminCategoriesController');
    Route::resource('admin/media','MediaController');
    
    Route::resource('admin/comments','PostCommentsController');
    Route::resource('admin/comments/replies','CommentRepliesController');
    
    
    
    
    
    
});


Route::get('post/{id}','AdminPostsController@post');

// user route
//
//Route::get('blog',function(){
//    return view('layouts.blog-home');
//});
    Route::get('blog','BlogController@index')->name('home');
    Route::get('post-details/{id}','BlogController@postDetails')->name('post-details');
  //  Route::get('post-list/{id}','BlogController@postListByUser')->name('post-list');