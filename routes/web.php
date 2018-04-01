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

Route::get('/menininkai', 'HomeController@menininkai')->name('menininkai');
Route::get('/renginiai', 'HomeController@renginiai')->name('renginiai');

Route::get('/dizainas', 'HomeController@dizainas')->name('dizainas');
Route::get('/fotografija', 'HomeController@fotografija')->name('fotografija');
Route::get('/dirbtuves', 'HomeController@dirbtuves')->name('dirbtuves');

Route::get('/menu-ledai', 'HomeController@menu')->name('menu');

Route::get('/kontaktai', 'HomeController@kontaktai')->name('kontaktai');


//ADMIN routes
Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');
Route::apiResource('/admin/art-shows', 'ArtShowController');
Route::post('/admin/pictures', 'PictureController@store')->name('pictures.store');
Route::delete('/admin/pictures/{picture}', 'PictureController@destroy')->name('pictures.delete');