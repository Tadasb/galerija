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

Auth::routes();


//Homepage routes
Route::get('/', 'HomeController@index')->name('index');

Route::get('/parodos', 'HomeController@parodos')->name('parodos');
Route::get('/parodos/{url}', 'HomeController@paroda')->name('paroda');

Route::get('/menininkai', 'HomeController@menininkai')->name('menininkai');
Route::get('/menininkai/{url}', 'HomeController@menininkas')->name('menininkas');

Route::get('/renginiai', 'HomeController@renginiai')->name('renginiai');
Route::get('/renginiai/{url}', 'HomeController@renginys')->name('renginys');

Route::get('/dizainas', 'HomeController@dizainas')->name('dizainas');
Route::get('/fotografija', 'HomeController@fotografija')->name('fotografija');

Route::get('/dirbtuves', 'HomeController@dirbtuves')->name('dirbtuves');
Route::get('/dirbtuves/{url}', 'HomeController@dirbtuve')->name('dirbtuve');

Route::get('/meniu', 'HomeController@meniu')->name('meniu');
Route::get('/ledai', 'HomeController@ledai')->name('ledai');
Route::get('/nuoma', 'HomeController@nuoma')->name('nuoma');

Route::get('/kontaktai', 'HomeController@kontaktai')->name('kontaktai');


//ADMIN routes

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function() {
	Route::get('/', 'AdminController@dashboard')->name('dashboard');
	Route::apiResource('/art-shows', 'ArtShowController');
	Route::apiResource('/pages', 'PageController');
	Route::apiResource('/items', 'ItemController');
	Route::post('/pictures', 'PictureController@store')->name('pictures.store');
	Route::delete('/pictures/{picture}', 'PictureController@destroy')->name('pictures.delete');

	Route::group(['prefix' => 'uploads', 'as' => 'uploads.'], function() {
	    Route::post('/pictures', 'UploadController@storePicture')->name('pictures.store');
	    Route::delete('/{id}', 'UploadController@delete')->name('delete');
	});
});


