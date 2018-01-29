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
Route::get('/site1Inventory', 'HomeController@site1Inventory')->name('site1Inventory');
Route::get('/site2Inventory', 'HomeController@site2Inventory')->name('site2Inventory');
Route::post('/saveStockInventory', 'HomeController@saveStockInventory')->name('saveStockInventory');
Route::post('/saveSite1Inventory', 'HomeController@saveStockInventory')->name('saveSite1Inventory');
Route::post('/saveSite2Inventory', 'HomeController@saveStockInventory')->name('saveSite2Inventory');
Route::get('/stockReport', 'HomeController@stockReport')->name('stockReport');
Route::get('/site1Report', 'HomeController@site1Report')->name('site1Report');
Route::get('/site2Report', 'HomeController@site2Report')->name('site2Report');
