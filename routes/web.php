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


/*Route::view('Usuario.index');*/
Route::resource('usuarios','UsuariosController');
Route::post('usuarios/eliminar/{id}','UsuariosController@eliminar')->name('eliminar');

Route::resource('direcciones','DireccionController');
Route::post('direcciones/eliminar/{id}','DireccionController@eliminarDir')->name('eliminarDir');