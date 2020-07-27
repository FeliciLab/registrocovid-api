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


Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', 'Api\JWTAuthController@register');
    Route::post('login', 'Api\JWTAuthController@login');
});

Route::group([
    'middleware' => ['apiJwt'],
], function ($router) {

    Route::group([
        'prefix' => 'auth'
    ], function ($router) {
        Route::post('logout', 'Api\JWTAuthController@logout');
        Route::post('refresh', 'Api\JWTAuthController@refresh');
        Route::get('profile', 'Api\JWTAuthController@profile');
    });
    
    Route::get('/pacientes', 'Api\PacienteController@index');
    Route::get('/pacientes/{id}', 'Api\PacienteController@show');
    Route::post('/pacientes', 'Api\PacienteController@store');
    Route::put('/pacientes/{id}', 'Api\PacienteController@update');
    Route::delete('/pacientes/{id}', 'Api\PacienteController@destroy');
});
