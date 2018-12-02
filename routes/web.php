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
    return view('index');
});

//list show painting
Route::resource('painting','PaintingController');
Route::resource('sculpture','SculptureController');
Route::resource('statue','StatueController');
Route::resource('other','OtherController');

//show 
Route::resource('artist','ArtistController');
Route::resource('exhibition','ExhibitionController');
Route::resource('collection','CollectionController');

Route::get('/enroll/{Ex_id}/{id}','ExhibitionHasUserController@store');
Route::get('/booking/{id}','UserController@show');
Route::get('/cancel/{Ex_id}/{id}','UserController@destroy');


//store art_obj
Route::get('donation','Art_objController@index');
Route::post('store','Art_objController@store');

//Route::get('enroll','ExhibitionHasUserController@enroll');

//store art_obj
//Route::post('store','PaintingController@store');
//Route::patch('store','PaintingController@store');

Auth::routes();
