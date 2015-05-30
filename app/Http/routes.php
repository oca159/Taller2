<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Taller2\Cuenta;
use Taller2\Usuario;
use Taller2\Libro;
use Taller2\Prestamo;
use Taller2\RelacionPrestamo;
use Taller2\Multa;

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::pattern('id', '[0-9]+');
Route::pattern('cuentas', '[0-9]+');
Route::pattern('usuarios', '[0-9]+');
Route::pattern('libros', '[0-9]+');
Route::pattern('prestamos', '[0-9]+');
Route::pattern('retrasos', '[0-9]+');
    
/**
 * Group resource Admin
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    Route::resource('cuentas', 'CuentasController');
    Route::resource('usuarios', 'UsuariosController');
    Route::resource('libros', 'LibrosController');
    Route::get('prestamos/lista', 'PrestamosController@lista');
    Route::resource('prestamos', 'PrestamosController');
    Route::resource('retrasos', 'RetrasosController');
});
