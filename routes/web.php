<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
    'register' => false,
]);

Route::middleware(['auth'])->group(function () {
    Route::group([
        'prefix' => 'admin',
    ], function () {
        Route::group(['middleware' => 'admin'], function () {
            Route::get('/parse', 'MainController@parse')->name('parse');
        });
    });
});

Route::get('/', 'MainController@index')->name('index');
Route::get('/show/{url}', 'MainController@show')->name('show');
Route::get('/full/{url}', 'MainController@full')->name('full');
Route::get('/news/click/id={url}', 'MainController@link')->name('link');

Route::get('/enter', function ()
{
    return view('layouts.enter');
});

// Route::get('/home', 'HomeController@index')->name('home');
