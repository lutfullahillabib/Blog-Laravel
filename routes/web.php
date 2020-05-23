<?php

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

Route::get('/test',function(){
  // dd(App\profile::find(1)->user);
  dd(Auth::check());
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){


  Route::get('/user/profile',[
    'uses' => 'ProfileController@index',
    'as' => 'user.profile'
  ]);
  Route::post('/user/profile/update',[
    'uses' => 'ProfileController@update',
    'as' => 'user.profile.update'
  ]);



  Route::get('/users',[
    'uses' => 'UsersController@index',
    'as' => 'users'
  ]);

  Route::get('/user/create',[
    'uses' => 'UsersController@create',
    'as' => 'user.create'
  ]);

  Route::post('/user/store',[
    'uses' => 'UsersController@store',
    'as' => 'user.store'
  ]);

  Route::get('/user/admin/{id}',[
    'uses' => 'UsersController@admin',
    'as' => 'user.admin'
  ]);

  Route::get('/user/not-admin/{id}',[
    'uses' => 'UsersController@not_admin',
    'as' => 'user.not.admin'
  ]);





  Route::get('/posts',[
    'uses' => 'PostsController@index',
    'as' => 'posts'
  ]);

  Route::get('/posts/trashed',[
    'uses' => 'PostsController@trashed',
    'as' => 'posts.trashed'
  ]);

  Route::get('/post/create',[
    'uses' => 'PostsController@create',
    'as' => 'post.create'
  ]);

  Route::post('/post/store',[
    'uses' => 'PostsController@store',
    'as' => 'post.store'
  ]);

  Route::get('/post/edit/{id}',[
    'uses' => 'PostsController@edit',
    'as' => 'post.edit'
  ]);
  Route::post('/post/update/{id}',[
    'uses' => 'PostsController@update',
    'as' => 'post.update'
  ]);


  Route::get('/post/delete/{id}',[
    'uses' => 'PostsController@destroy',
    'as' => 'post.destroy'
  ]);
  Route::get('/post/kill/{id}',[
    'uses' => 'PostsController@kill',
    'as' => 'post.kill'
  ]);

  Route::get('/post/restore/{id}',[
    'uses' => 'PostsController@restore',
    'as' => 'post.restore'
  ]);

  Route::get('/tags',[
    'uses' => 'TagsController@index',
    'as' => 'tags'
  ]);

  Route::get('/tag/create',[
    'uses' => 'TagsController@create',
    'as' => 'tag.create'
  ]);

  Route::post('/tag/store',[
    'uses' => 'TagsController@store',
    'as' => 'tag.store'
  ]);

  Route::get('/tag/edit/{id}',[
    'uses' => 'TagsController@edit',
    'as' => 'tag.edit'
  ]);

  Route::post('/tag/update/{id}',[
    'uses' => 'TagsController@update',
    'as' => 'tag.update'
  ]);

  Route::get('/tag/delete/{id}',[
    'uses' => 'TagsController@destroy',
    'as' => 'tag.destroy'
  ]);



  Route::get('/categories',[
    'uses' => 'CategoriesController@index',
    'as' => 'categories'
  ]);

  Route::get('/category/create',[
    'uses' => 'CategoriesController@create',
    'as' => 'category.create'
  ]);

  Route::post('/category/store',[
    'uses' => 'CategoriesController@store',
    'as' => 'category.store'
  ]);

  Route::get('/category/edit/{id}',[
    'uses' => 'CategoriesController@edit',
    'as' => 'category.edit'
  ]);

  Route::post('/category/update/{id}',[
    'uses' => 'CategoriesController@update',
    'as' => 'category.update'
  ]);

  Route::get('/category/delete/{id}',[
    'uses' => 'CategoriesController@destroy',
    'as' => 'category.destroy'
  ]);

});