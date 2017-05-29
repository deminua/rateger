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



Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('welcome/{locale}', function ($locale) {
    //return dd($locale);
    App::setLocale($locale);
    return view('home');
    //
});

Route::get('lang/{lang}', [
    'as' => 'lang',
    'uses' => 'Controller@setlocale'
])->where(['lang' => '[a-z]+']);

Auth::routes();