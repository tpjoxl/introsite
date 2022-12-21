<?php

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

// Route::get('/', function () {
//     return view('frontend.home');
// });

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'about'], function () {
    Route::get('/', 'AboutController@index')->name('about.index');
});

Route::group(['prefix' => 'workcase'], function () {
    Route::get('/', 'WorkCaseController@index')->name('workcase.index');
    // Route::get('category' . '/{category}', 'WorkCaseController@category')->name('workcase.category');
    Route::get('/{slug}', 'WorkCaseController@detail')->name('workcase.detail');
});

Route::group(['prefix' => 'contact'], function () {
    Route::get('/', 'ContactController@index')->name('contact.index');
    Route::post('/', 'ContactController@submit')->name('contact.submit');
});
