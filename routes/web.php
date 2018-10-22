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
Route::get('test', function(){
});
Route::group(['prefix'=>'/'], function(){
    Route::get('', 'FrontendController@getIndex')->name('index');
    Route::get('category/{id}/{slug}', 'FrontendController@getCate')->name('front-cate');
    Route::get('post/{id}/{slug}', 'FrontendController@getPostDetail')->name('post-detail'); 
    Route::post('post/{id}/{slug}', 'FrontendController@postComment');
    Route::get('author/{id}', 'FrontendController@getAuthor')->name('author'); 
    Route::get('contact', 'FrontendController@getContact')->name('contact');
    
    Route::middleware('auth')->group(function(){
        Route::get('/profile', 'ProfileController@profile')->name('profile');
        Route::post('/profile', 'ProfileController@editProfile');
        Route::get('/add', 'ProfileController@getAddPost')->name('useradd-post');
        Route::post('/add', 'ProfileController@postAddPost');
        Route::get('/edit/{id}', 'ProfileController@getEdit')->name('useredit-post');
        Route::post('/edit/{id}', 'ProfileController@postEdit');
        Route::get('delete/{id}', 'ProfileController@getDelete')->name('userdelete-post');
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
    Route::get('logout', 'HomeController@getLogout')->name('logout');
    //Dashboard
    Route::group(['prefix'=>'admin', 'middleware'=>'CheckLogout'], function() {
        Route::get('dashboard', 'HomeController@getDashboard')->name('admin-panel');
        //Users
        Route::group(['prefix'=>'user'], function(){
            Route::get('/', 'UserController@getUser')->name('user-panel');
            //Add
            Route::get('add', 'UserController@getAddUser')->name('add-user');
            Route::post('add', 'UserController@postAddUser');
            //Edit
            Route::get('/detail/{id}', 'UserController@userDetail')->name('user-detail');
            Route::post('/detail/{id}', 'UserController@editUser');
            //Delete
            Route::get('delete/{id}', 'UserController@deleteUser')->name('delete-user');
        });

        //Category
        Route::group(['prefix'=>'category'], function() {
            Route::get('/', 'CategoryController@listCategory')->name('category-panel');
            //Add Category
            Route::post('/', 'CategoryController@postAddCate');
            //Edit
            Route::get('edit/{id}', 'CategoryController@getEditCate')->name('edit-cate');
            Route::post('edit/{id}', 'CategoryController@postEditCate');
            //Delete
            Route::get('delete/{id}', 'CategoryController@deleteCategory')->name('delete-cate');
        });

        //Post
        Route::group(['prefix'=>'post'], function() {
            Route::get('/', 'PostController@listPost')->name('post-panel');
            //Create post
            Route::get('add', 'PostController@getAddPost')->name('add-post');
            Route::post('add', 'PostController@postAddPost');
            //Edit post
            Route::get('edit/{id}', 'PostController@getEditPost')->name('edit-post');
            Route::post('edit/{id}', 'PostController@postEditPost');
            //Delete
            Route::get('delete/{id}', 'PostController@getDeletePost')->name('delete-post');
        });
        //Tag
        Route::group(['prefix'=>'tag'], function(){
            Route::get('/', 'TagController@listTag')->name('tag-panel');
            //Add
            Route::post('/', 'TagController@addTag');
            //Edit tag
            Route::get('edit/{id}', 'TagController@getEditTag')->name('edit-tag');
            Route::post('edit/{id}', 'TagController@postEditTag');
            //Delete tag
            Route::get('delete/{id}', 'TagController@getDeleteTag')->name('delete-tag');
        });
    });
});
