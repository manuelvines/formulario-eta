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

Route::get('/', 'PersonaInformationController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//PROTEGIDA PARA USARIOS AUTH
Route::resource('/persona', 'PersonaInformationFormController');

//REGISTRA DATOS PERSONALES
Route::post('/datos-personales','PersonaInformationController@store')->name('datos-personales');
//REGISTRA INFORMACIÓN ADICIONAL
Route::post('/datos-adicionales','OtherInformationController@store')->name('datos-adicionales');


Route::get('/informacion-adicional/{emailBase64Encode}', 'PersonaInformationController@test');

Route::get('/get-age/{age}',function($age){


    $age = \Carbon\Carbon::parse($age )->age;
    return $age;

})->name('get-age');
