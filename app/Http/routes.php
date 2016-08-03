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
Route::get('user/{user}',function(\App\User $user){
    return $user;
})->middleware('throttle:3');
//Route::get('/', 'Articlecontroller@index');
//
//Route::get('article','Articlecontroller@show');
//Route::get('article/create','Articlecontroller@create');
//Route::post('article/store','Articlecontroller@store');
//Route::post('article/update','Articlecontroller@update');
//Route::get('article/edit/{id}','ArticleController@edit');
//
//Route::get('auth/login','Auth\AuthController@getLogin');
//Route::post('auth/login','Auth\AuthController@postLogin');
//Route::get('auth/register','Auth\AuthController@getRegister');
//Route::get('auth/register','Auth\AuthController@postRegister');
//Route::get('auth/logout','Auth\AuthController@getLogout');
//
//Route::auth();
//
//Route::get('/home', 'HomeController@index');
//Route::group(["prefix"=>"api/v1"],function(){
//    Route::resource("lessons","LessonsController");
//});
//Route::auth();
//
//Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/', 'HomeController@index');
