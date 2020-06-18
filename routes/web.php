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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('gerentes', 'GerenteController');

Route::resource('operacions', 'OperacionController');

Route::resource('proyectos', 'ProyectoController');

Route::resource('regions', 'RegionController');

Route::resource('users', 'UserController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('conceptos', 'ConceptoController');

Route::resource('grupos', 'GrupoController');

Route::resource('operacionDets', 'OperacionDetController');

Route::resource('operacionHistoricos', 'OperacionHistoricoController');