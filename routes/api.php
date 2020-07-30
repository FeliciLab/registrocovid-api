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
    Route::get('/pacientes', 'Api\Paciente\PacienteController@index');
    Route::post('/pacientes', 'Api\Paciente\PacienteController@store');
    Route::get('/historico/{paciente_id}', 'Api\HistoricoController@show');
    Route::post('/historico/{paciente_id}', 'Api\HistoricoController@store');
    Route::put('/historico/{id}', 'Api\HistoricoController@update');    
    Route::get('/situacao-uso-drogas', 'Api\SituacaoUsoDrogasController@index');
    Route::get('/drogas', 'Api\DrogaController@index');
    Route::post('/drogas', 'Api\DrogaController@store');
    Route::get('estados', 'Api\EstadoController@index');
    Route::get('municipios', 'Api\MunicipioController@index');

    Route::post('identificacao/paciente/{id}', 'Api\Paciente\IdentificacaoPaciente@store');
});
