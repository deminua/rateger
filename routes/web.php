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

Route::group(['prefix' => 'test'], function () {

Route::get('ip', function () {
    return \Request::getClientIp(true);
});

Route::get('phpinfo', function () {
        phpinfo();
});

Route::get('file_get', function () {
    $url = 'https://lh4.googleusercontent.com/-6cLUs-fV0_g/AAAAAAAAAAI/AAAAAAAAAMI/R_DLCKluo3o/photo.jpg';
    $url = 'https://media1.giphy.com/avatars/nikdudukovic/ylDRTR05sy6M.gif';
    #$url = 'https://upload.wikimedia.org/wikipedia/commons/4/47/PNG_transparency_demonstration_1.png';
    #$url = 'https://scontent.xx.fbcdn.net/v/t1.0-1/p160x160/12002279_129533897399267_5995534293520114082_n.jpg?oh=5dd49a6826f7c0cdc845439dcf506e4f&oe=59E18532';
    #$url = 'https://graph.facebook.com/v2.9/209163186236306/picture?width=1920';

    dd(App\User::urlStoreAvatar($url));
});

});

Route::get('/home', 'HomeController@index')->name('home');

/*Route::get('welcome/{locale}', function ($locale) {

    //return dd($locale);
    App::setLocale($locale);
    return view('home');
    //
});*/

Route::get('lang/{lang}', [
    'as' => 'lang',
    'uses' => 'Controller@setlocale'
])->where(['lang' => '[a-z]+']);


Route::get('sign', function () { return view('auth.social'); })->name('sign');

Route::group(['prefix' => 'social'], function () {
    Route::get('{provider}', 'SocialController@login')->name('social');
    Route::get('callback/{provider}', 'SocialController@callback');
    Route::get('disable/{provider}', 'SocialController@disable')->name('social.disable');
});


Auth::routes();


Route::get('/{slug}', 'UserController@show')->name('user.show');
