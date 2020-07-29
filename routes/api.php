<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvidprojetosPorCategoriaer within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('register', 'Api\JWTAuthController@register');
    Route::post('login', 'Api\JWTAuthController@login');
});

Route::group(['middleware' => ['apiJwt']], function ($router) {
    Route::post('logout', 'Api\JWTAuthController@logout');
    Route::post('refresh', 'Api\JWTAuthController@refresh');
    Route::get('profile', 'Api\JWTAuthController@profile');
});

Route::group(['middleware' => ['apiJwt']], function ($router) { 
    Route::namespace('Api')->group(function() {
        Route::get('/pacientes', 'Paciente\PacienteController@index');
        Route::post('/pacientes', 'Paciente\PacienteController@store');

        Route::namespace('Historico')->group(function() {
            Route::get('/historico/{paciente_id}', 'HistoricoController@show');
            Route::post('/historico/{paciente_id}', 'HistoricoController@store');
            Route::put('/historico/{id}', 'HistoricoController@update');

            Route::get('/situacao-uso-drogas', 'SituacaoUsoDrogasController@index');

            Route::get('/drogas', 'DrogaController@index');
            Route::post('/drogas', 'DrogaController@store');
        });

        Route::namespace('Comorbidade')->group(function() {
        });
    });
});
