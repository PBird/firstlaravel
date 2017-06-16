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

Route::get('/{page?}', 'SiteController@index');
Route::get('/giris/admin', 'PanelController@index');
Route::get('/giris/admin/store', 'PanelController@store');
Route::get('/giris/admin/{id}/delete', 'PanelController@delete');
Route::get('/giris/admin/{id}/update', 'PanelController@update');
