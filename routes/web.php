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
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');




//Backend Before Auth
Route::group(['prefix' => 'admin', 'middleware' => ['guest', 'prevent.back.history']], function () { 
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', function () {
        return view('backend.home');
    });
    
    Route::get('login', [
        'as'    => 'admin.login',
        'uses'   => 'Backend\Auth\LoginController@showLoginForm'
    ]);

    Route::post('auth', [
        'as'    => 'admin.auth',
        'uses'   => 'Backend\Auth\LoginController@login'
    ]);
    
    Route::get('register', [
        'as'    => 'admin.register',
        'uses'   => 'Backend\Auth\RegisterController@showRegistrationForm'
    ]);

    Route::post('register', [
        'as'    => 'admin.saveRegister',
        'uses'   => 'Backend\Auth\RegisterController@register'
    ]);
});

//Backend After Auth
Route::group(['prefix' => 'admin', 'middleware' => ['prevent.back.history', 'backend']], function () {    
    Route::get('panel', [
        'as'    => 'admin.panel',
        'uses'   => 'Backend\AdminController@panel'
    ]);

    Route::post('logout', [
        'as'    => 'admin.logout',
        'uses'   => 'Backend\Auth\LoginController@logout'
    ]);

    Route::get('index', [
        'as'    => 'admin.index',
        'uses'   => 'Backend\AdminController@index'
    ]);


    //Test

    Route::get('test', [
        'as'    => 'test.index',
        'uses'   => 'Backend\TestController@index'
    ]);

    Route::get('getAll', [
        'as'    => 'test.getAll',
        'uses'   => 'Backend\TestController@getAll'
    ]);

    Route::get('item', [
        'as'    => 'test.item',
        'uses'   => 'Backend\TestController@item'
    ]);

    Route::post('testStore', [
        'as'    => 'test.store',
        'uses'   => 'Backend\TestController@store'
    ]);

    Route::post('testUpdate', [
        'as'    => 'test.update',
        'uses'   => 'Backend\TestController@update'
    ]);

    Route::post('testEdit', [
        'as'    => 'test.edit',
        'uses'   => 'Backend\TestController@edit'
    ]);

    Route::post('testDelete', [
        'as'    => 'test.delete',
        'uses'   => 'Backend\TestController@destroy'
    ]);
});




//Frontend Before Auth
Route::group(['middleware' => ['guest', 'prevent.back.history']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', function () {
        return view('frontend.home');
    });
    
    Route::get('login', [
        'as'    => 'user.login',
        'uses'   => 'Frontend\Auth\LoginController@showLoginForm'
    ]);

    Route::post('auth', [
        'as'    => 'user.auth',
        'uses'   => 'Frontend\Auth\LoginController@login'
    ]);
    
    Route::get('register', [
        'as'    => 'user.register',
        'uses'   => 'Frontend\Auth\RegisterController@showRegistrationForm'
    ]);

    Route::post('register', [
        'as'    => 'user.saveRegister',
        'uses'   => 'Frontend\Auth\RegisterController@register'
    ]);
});

//Frontend After Auth
Route::group(['middleware' => ['prevent.back.history', 'frontend']], function () {    
    Route::get('panel', [
        'as'    => 'user.panel',
        'uses'   => 'Frontend\UserController@panel'
    ]);

    Route::post('logout', [
        'as'    => 'user.logout',
        'uses'   => 'Frontend\Auth\LoginController@logout'
    ]);

    Route::get('index', [
        'as'    => 'user.index',
        'uses'   => 'Frontend\UserController@index'
    ]);

    Route::get('user', [
        'as'    => 'user.data',
        'uses'   => 'Frontend\UserController@data'
    ]);

    Route::get('user_getAll', [
        'as'    => 'user.getAll',
        'uses'   => 'Frontend\UserController@getAll'
    ]);
});