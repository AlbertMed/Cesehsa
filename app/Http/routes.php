<?php

use App\articulos;
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

Route::get('/home', 'WelcomeController@index');

Route::get('/', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/prueba','testController@store');

Route::get('/registro','testController@registro');

Route::get('Home/datos/{valor}','HomeController@datos');

Route::get('productos/{num}', 'HomeController@listarProductos');

Route::get('carrito', 'CarritoController@index');

Route::get('addItemCarrito/{valor}', 'CarritoController@store');