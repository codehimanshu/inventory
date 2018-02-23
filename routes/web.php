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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/stockInventory', 'HomeController@stockInventory')->name('stockInventory');
Route::post('/saveStockInventory', 'HomeController@saveStockInventory')->name('saveStockInventory');
Route::get('/tosite', 'HomeController@tosite')->name('tosite');
Route::post('/saveToSite', 'HomeController@saveToSite')->name('saveToSite');
Route::get('/stockReport', 'HomeController@stockReport')->name('stockReport');
Route::get('/logReport', 'HomeController@logReport')->name('logReport');
Route::get('/site1Report', 'HomeController@site1Report')->name('site1Report');
Route::get('/site2Report', 'HomeController@site2Report')->name('site2Report');
