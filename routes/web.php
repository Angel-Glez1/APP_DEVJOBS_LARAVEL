<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


/**
 * Agrupar rutas que van a ocupar diferentes middlewares
*/
Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');
    Route::post('/vacantes', 'VacanteController@store')->name('vacantes.store');
    Route::delete('/vacantes/{vacante}', 'VacanteController@destroy')->name('vacantes.destroy');

    // Subir imaganes
    Route::post('/vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen', 'VacanteController@borrarimagen')->name('vacantes.borrarimagen');

    // Cambiar el estado de la vacante
    Route::post('/vacantes/{vacante}', 'VacanteController@estado')->name('vacantes.estado');

    // Notificaciones
    Route::get('/notificaciones', 'NotificacionesController')->name('notificaciones'); 

});

Route::get('/candidatos/{id}', 'CandidatoController@index')->name('candidato.index');
Route::post('/candidatos/store', 'CandidatoController@store' )->name('candidatos.store');

// Muestra los trabajos desponibles sin autentificación
Route::get('/vacantes/{vacante}', 'VacanteController@show' )->name('vacantes.show');





