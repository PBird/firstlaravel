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
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

Route::get('/{page?}', 'SiteController@index');
Route::get('/giris/admin', 'PanelController@index');
Route::post('/giris/admin/store', 'PanelController@store');
Route::get('/giris/admin/{id}/delete', 'PanelController@delete');
Route::get('/giris/admin/{id}/update', 'PanelController@update');
Route::post('/fileupload', function(Request $request ) {

   
 $img = Image::make($_FILES['image']['tmp_name']); 

 $img->fit(300, 200);
  

  $img->save('images/bar.jpg');



} 
	);
