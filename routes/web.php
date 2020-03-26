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

//Route::get('/', function () {
//    return view('index/index');
//});

Route::get('/','IndexController@index');
Route::get('login','Index\IndexController@login');
Route::get('wxre','Index\IndexController@wxre');
Route::get('imag','Index\IndexController@imag');
Route::get('wx','Index\IndexController@wx');
Route::get('index/login','Index\IndexController@loginlist');
Route::post('index/logins','Index\IndexController@logins');
