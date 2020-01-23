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
//for post page
Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);


Route::get('/admin', function (){
    return view('admin.index');
});


Route::group(['middleware'=>'admin'],function (){
    Route::resource('/admin/users','AdminUsersController');
    Route::resource('/admin/posts','AdminPostsController');
    Route::resource('/admin/categories','AdminCategoriesController');
    Route::resource('/admin/media','AdminMediaController');
//    routes for comment and replies
    Route::resource('/admin/comments','PostCommentsController');
    Route::resource('/admin/comment/replies','CommentRepliesController');

//    Route::get('admin/media/upload',['as'=>'admin.media.upload','uses'=>'AdminMediaController@store']);
});

Route::group(['middleware'=>'auth'],function () {
Route::post('comment/reply','CommentRepliesController@createReply');
});
