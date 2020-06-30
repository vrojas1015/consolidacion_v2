<?php

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

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/login_gerente', 'Auth\LoginController@showLoginFormG');
Route::post('/login_g','Auth\LoginController@authenticateG')->name('login_g');
Auth::routes();

//Auth::routes(['verify' => true]);
Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/email', 'HomeController@enviarEmail')->name('email');
    Route::resource('gerentes', 'GerenteController');
    Route::resource('desglose', 'DesgloseController');
    Route::post('/buscar', 'DesgloseController@buscar')->name('buscar');
    Route::post('/buscarshow', 'DesgloseController@buscar')->name('buscar');
    Route::resource('proyectos', 'ProyectoController');
    Route::resource('regions', 'RegionController');
    Route::resource('users', 'UserController');
    Route::resource('conceptos', 'ConceptoController');
    Route::resource('operacionDets', 'OperacionDetController');
    Route::resource('operacionHistoricos', 'OperacionHistoricoController');
    Route::resource('grupos', 'GrupoController');
    Route::get('/reporte', 'HomeController@export')->name('reporte');

});
Route::group(['middleware' => 'auth:gerente'], function () {
    Route::get('/gerente', 'GerenteController@indexGerente')->name('h_gerente');
});
//Route::get('/home', 'HomeController@index')->name('home');


