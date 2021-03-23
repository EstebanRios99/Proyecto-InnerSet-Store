<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//return $request->user();
Route::group(['middleware' => ['cors']], function () {

    //Rutas para la combio de password
    Route::post('users/create', 'UserController@create');
    Route::get('users/find/{token}', 'UserController@find');
    Route::post('users/reset', 'UserController@reset');
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@authenticate');

    //verificar correo
    Route::name('verify')->get('users/verify/{code}', 'UserController@verify');
    Route::name('resent')->get('users/{user}/resend', 'UserController@resend');
    Route::get('products', 'ProductController@index');


    Route::group(['middleware' => ['jwt.verify']], function () {
        Route::get('user', 'UserController@getAuthenticatedUser');
        Route::post('logout', 'UserController@logout');
        //category
        Route::get('categories', 'CategoryController@index');
        Route::get('categories/{category}', 'CategoryController@show');
        Route::post('categories', 'CategoryController@store');
        Route::put('categories/{category}', 'CategoryController@update');
        //Route::delete('categories/{category}', 'CategoryController@delete');
        //product
        //Route::get('products', 'ProductController@index');
        Route::get('products/{product}', 'ProductController@show');
        Route::get('product/{name}','ProductController@searchProduct');
        Route::post('products', 'ProductController@store');
        Route::put('products/{product}', 'ProductController@update');
        Route::delete('products/{product}', 'ProductController@delete');
        //request
        Route::get('requests', 'RequestController@index');
        Route::get('requests/{arequest}', 'RequestController@show');
        Route::get('request/user', 'RequestController@requestsByUser');
        Route::post('requests', 'RequestController@store');
        Route::put('requests/{arequest}', 'RequestController@update');
        Route::delete('requests/{request}', 'RequestController@delete');
        Route::put('requests/status/{arequest}', 'RequestController@updatestatus');

        //detail
        Route::get('requests/{request}/details', 'DetailRequestController@index');
        Route::get('requests/{request}/details/{detail}', 'DetailRequestController@show');
        Route::post('requests/{arequest}/details', 'DetailRequestController@store');

        //pdf
        Route::get('pdf/requests/{date_start}/{date_end}', 'PDFController@PDFRequests');
        Route::get('pdf/products/{date_start}/{date_end}', 'PDFController@PDFProducts');
        Route::get('pdf/stock/', 'PDFController@PDFStock');
    });
});


