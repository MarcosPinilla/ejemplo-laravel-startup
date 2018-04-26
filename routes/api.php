<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Grupo de rutas que tienen un middleware jwt.auth
Route::group(['middleware' => ['jwt.auth']], function () {
	
	//Empresa routes
	Route::resource('empresas', 'EmpresaController');
	Route::resource('empresa', 'EmpresaController@indexPersonalizado');

	//Propiedad routes
    Route::resource('propiedades', 'PropiedadController');
    Route::get('propiedad', 'PropiedadController@indexPersonalizado');

	//User routes
	Route::resource('usuarios', 'UserController');

	//Cliente routes
	Route::resource('clientes', 'ClienteController');
	Route::get('cliente/reservas/{id_cliente}', 'ClienteController@getReservas');
	Route::get('cliente/reservas/abiertas/{id_cliente}', 'ClienteController@getReservasAbiertas');
	//Reservas
	Route::resource('reservas', 'ReservaVisitaController');
	Route::get('reservapropiedad', 'ReservaVisitaController@reservaPropiedad');
	Route::get('reservas_propiedades', 'ReservaVisitaController@diasRestantesReserva');
	
});
//Nueva ruta para el login
Route::post('/login', 'AuthenticateController@authenticate');

/*
Route::ApiResource('empresas', 'EmpresaController');

Route::ApiResource('propiedades', 'PropiedadController');

Route::ApiResource('usuarios', 'UserController');
*/