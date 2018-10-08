<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/','MainController@index')->middleware('guest');
    Route::get('/services','ServiceController@index');
    Route::get('/prices','ServiceController@prices');
    Route::get('/orders','OrderController@index');
    Route::post('/orders','OrderController@store');
    Route::get('/contacts','ContactController@index');

    Route::get('/admin/', function () {
        return view('admin');
    })->middleware('auth');

    Route::resource('admin/services', 'Admin\AdminServiceController');
    Route::resource('admin/orders', 'Admin\AdminOrderController');
    Route::patch('admin/services/{services}/updateImg', 'Admin\AdminServiceController@updateImg')->middleware('auth');

    Route::post('admin/ajax/modals', 'Admin\AdminAjaxController@modals')->middleware('auth');

//    Route::get('/admin/pages', 'Admin\PageController@index');
//    Route::get('/admin/page', 'Admin\PageController@store');
//    Route::post('/admin/page', 'Admin\PageController@store');
//    Route::get('/admin/page/{page}', 'Admin\PageController@edit');
//    Route::patch('/admin/page/{page}', 'Admin\PageController@edit');
//    Route::delete('/admin/page/{page}', 'Admin\PageController@destroy');
//    Route::get('/tasks', 'TaskController@index');
//    Route::post('/task', 'TaskController@store');
//    Route::delete('/task/{task}', 'TaskController@destroy');

    Route::auth();

});
