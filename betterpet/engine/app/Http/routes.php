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
    Route::get('/','HomeController@index');
    Route::get('/adoption','HomeController@adoption');
    Route::get('/shelter','HomeController@shelter');
    Route::post('/shelter','HomeController@searchShelter');
    Route::post('/adoption','HomeController@searchAdoption');
    Route::get('/about','HomeController@about');
    Route::get('/faq','HomeController@faq');
    Route::get('/adoption/{id}','HomeController@adoptionInfo');
    Route::get('/news','HomeController@news');
    Route::get('/news/{id}','HomeController@singleNews');
    Route::get('/login','UserController@loginForm');
    Route::get('/register','UserController@registerForm');
    Route::post('/login','UserController@login');
    Route::get('/contact','HomeController@contact');
    Route::post('/contact','HomeController@contactPost');
    Route::post('/register','UserController@register');
    Route::get('/register/google','UserController@google');
    Route::get('/register/facebook','UserController@facebook');
    Route::get('/register/gCallBack','UserController@googleCallBack');
    Route::get('/register/fCallBack','UserController@facebookCallBack');  
    Route::get('/logout','UserController@logout');
    Route::get('/admin','AdminController@index');
    Route::post('/admin/news/new','AdminController@createNews');
    //Route::get('/admin/news/new','AdminController@newNews');
    Route::get('/admin/news/update/{id}','AdminController@viewUpdateNews');
    Route::post('/admin/news/update','AdminController@updateNews');
    //Route::post('/admin/news/new','AdminController@newNews');
    Route::get('/admin/news/delete/{id}','AdminController@deleteNews');
    Route::get('/shelter/{id}','HomeController@shelterInfo');
    Route::get('/profile/view/{id}','HomeController@viewProfile');
});
Route::group(['middleware'=>['web','usermid']],function(){
    Route::get('/profile','UserController@showProfile');
    Route::post('/profile','UserController@editProfile');
    Route::post('/adoption/new','UserController@newAdoption');
    Route::get('/adoption/create','UserController@createAdoption');
    Route::post('/adoption/create','UserController@saveAdoption');
    Route::post('/adoption/delete/{id}','UserController@deleteAdoption');
    Route::post('/adoption/edit/{id}','UserController@editAdoption');
    Route::get('/adoption/mark/{id}','UserController@markDone');
    Route::get('/adoption/unmark/{id}','UserController@unmarkDone');
    Route::post('/shelter/new','UserController@newShelter');
    Route::post('/shelter/edit/{id}','UserController@editShelter');
    Route::post('/shelter/rate/{id}','UserController@leaveRating');
    Route::post('/adoption/request/{id}','UserController@requestAdoption');
    Route::post('/adoption/request/cancel/{id}','UserController@cancelRequest');
    Route::post('/shelter/remove/{id}','AdminController@removeShelter');
    Route::post('/adoption/remove/{id}','AdminController@removeAdoption');
    Route::post('/admin/newmap','AdminController@newMapMarker');
    Route::post('/admin/maprm/{id}','AdminController@removeMapMarker');
});
