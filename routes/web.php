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

Route::get('/','HomeController@index2')->name('home');
Route::get('/tested','HomeController@getForecast');
Route::get('/tested2','HomeController@graphForecast');

Route::get('/prediksi/{id}','HomeController@graphForecast')->name('forecast.detail');
Route::get('/tes',function()
{
    return view('auth.login2');
});

Route::get('/cari', 'CityController@loadData');
Route::post('/cari-jadwal', 'HomeController@search')->name('search.flight');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'],'prefix'=>'admin'], function () {
    Route::get('/', 'HomeController@indexAdmin')->name('admin.home');
    Route::resource('status', 'FlightStatusController');
    Route::resource('maskapai', 'AirlineController');
    Route::resource('pesawat', 'AirplaneController');
    Route::resource('kota', 'CityController');
    Route::resource('prediksi', 'ForecastController');
});

