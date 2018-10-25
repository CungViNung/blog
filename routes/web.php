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
Route::get('test', 'TestController@testt');
Route::group(['prefix'=>'/'], function(){
    Route::get('', 'FrontendController@index')->name('index');
    Route::get('category/{id}/{slug}', 'FrontendController@category')->name('front-cate');
    Route::get('post/{id}/{slug}', 'FrontendController@detail')->name('post-detail'); 
    Route::post('post/{id}/{slug}', 'FrontendController@comment');
    Route::get('author/{id}', 'FrontendController@author')->name('author'); 
    Route::get('contact', 'FrontendController@contact')->name('contact');
    
    Route::middleware('auth')->group(function(){
        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::post('/profile', 'ProfileController@show');
        Route::get('/add', 'ProfileController@create')->name('useradd-post');
        Route::post('/add', 'ProfileController@store');
        Route::get('/edit/{id}', 'ProfileController@edit')->name('useredit-post');
        Route::post('/edit/{id}', 'ProfileController@update');
        Route::get('delete/{id}', 'ProfileController@delete')->name('userdelete-post');
    });
});

Route::group(['namespace'=>'BackEnd'], function(){
    //Login
    Route::group(['prefix'=>'login', 'middleware'=>'CheckLogin'], function() {
        Route::get('/', 'LoginController@getLogin')->name('login');
        Route::post('/', 'LoginController@postLogin');
    });
    //Register
    Route::group(['prefix'=>'register', 'middleware'=>'CheckRegister'], function() {
        Route::get('/', 'RegisterController@getRegister')->name('register');
        Route::post('/', 'RegisterController@postRegister');
    });
    //Logout
    Route::get('logout', 'HomeController@logout')->name('logout');
    //Dashboard
    Route::group(['prefix'=>'admin', 'middleware'=>'CheckLogout'], function() {
        Route::get('dashboard', 'HomeController@index')->name('admin-panel');
        //Users
        Route::group(['prefix'=>'user'], function(){
            Route::get('/', 'UserController@index')->name('user-panel');
            //Add
            Route::get('add', 'UserController@create')->name('add-user');
            Route::post('add', 'UserController@store');
            //Edit
            Route::get('/detail/{id}', 'UserController@edit')->name('user-detail');
            Route::post('/detail/{id}', 'UserController@update');
            //Delete
            Route::get('delete/{id}', 'UserController@delete')->name('delete-user');
        });

        //Category
        Route::group(['prefix'=>'category'], function() {
            Route::get('/', 'CategoryController@index')->name('category-panel');
            //Add Category
            Route::post('/', 'CategoryController@store');
            //Edit
            Route::get('edit/{id}', 'CategoryController@edit')->name('edit-cate');
            Route::post('edit/{id}', 'CategoryController@update');
            //Delete
            Route::get('delete/{id}', 'CategoryController@delete')->name('delete-cate');
        });

        //Post
        Route::group(['prefix'=>'post'], function() {
            Route::get('/', 'PostController@index')->name('post-panel');
            //Create post
            Route::get('add', 'PostController@create')->name('add-post');
            Route::post('add', 'PostController@store');
            //Edit post
            Route::get('edit/{id}', 'PostController@edit')->name('edit-post');
            Route::post('edit/{id}', 'PostController@update');
            //Delete
            Route::get('delete/{id}', 'PostController@delete')->name('delete-post');
        });
        //Tag
        Route::group(['prefix'=>'tag'], function(){
            Route::get('/', 'TagController@index')->name('tag-panel');
            //Add
            Route::post('/', 'TagController@store');
            //Edit tag
            Route::get('edit/{id}', 'TagController@edit')->name('edit-tag');
            Route::post('edit/{id}', 'TagController@update');
            //Delete tag
            Route::get('delete/{id}', 'TagController@delete')->name('delete-tag');
        });
    });
});
