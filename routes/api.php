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
    Route::post('auth', 'Api\JWTAuthController@auth');
});

Route::group(['middleware' => ['apiJwt']], function ($router) {
    Route::post('logout', 'Api\JWTAuthController@logout');
    Route::post('refresh', 'Api\JWTAuthController@refresh');
    Route::get('profile', 'Api\JWTAuthController@profile');
});

Route::group(['middleware' => ['apiJwt']], function ($router) {
    Route::namespace('Api')->group(function () {
        Route::namespace('Paciente')->group(function () {
            Route::get('/pacientes', 'PacienteController@index');
            Route::post('/pacientes', 'PacienteController@store');


            Route::group(['middleware' => ['paciente']], function ($router) {
                Route::get('/pacientes/{pacienteId}', 'PacienteController@show');
                Route::patch('/pacientes/{pacienteId}', 'PacienteController@update');

                Route::get('/pacientes/{pacienteId}/historico', 'Historico\HistoricoController@show');
                Route::post('/pacientes/{pacienteId}/historico', 'Historico\HistoricoController@store');

                Route::get('/pacientes/{pacienteId}/comorbidades', 'Comorbidade\ComorbidadeController@show');
                Route::post('/pacientes/{pacienteId}/comorbidades', 'Comorbidade\ComorbidadeController@store');

                Route::post('/pacientes/{pacienteId}/identificacao', 'IdentificacaoPacienteController@store');
                Route::get('/pacientes/{pacienteId}/identificacao', 'IdentificacaoPacienteController@index');

                Route::post('/pacientes/{pacienteId}/exames-laboratoriais', 'ExamesLaboratoriais\ExamesLaboratoriaisController@store');
                Route::get('/pacientes/{pacienteId}/exames-laboratoriais', 'ExamesLaboratoriais\ExamesLaboratoriaisController@index');

                Route::get('/pacientes/{pacienteId}/evolucoes-diarias', 'EvolucaoDiariaController@index');
                Route::post('/pacientes/{pacienteId}/evolucoes-diarias', 'EvolucaoDiariaController@store');

                Route::get('/pacientes/{pacienteId}/complicacoes', 'ComplicacaoController@index');
                Route::post('/pacientes/{pacienteId}/complicacoes', 'ComplicacaoController@store');

                Route::post('/pacientes/{pacienteId}/exames-complementares', 'ExamesComplementares\ExamesComplementaresController@store');
                Route::get('/pacientes/{pacienteId}/exames-complementares', 'ExamesComplementares\ExamesComplementaresController@index');
                Route::post('/pacientes/{pacienteId}/tratamento-suporte', 'TratamentoSuporte\TratamentoSuporteController@store');
                Route::get('/pacientes/{pacienteId}/tratamento-suporte', 'TratamentoSuporte\TratamentoSuporteController@index');
                Route::post('pacientes/{pacienteId}/ventilacao-mecanica', 'ComplicacoesVentilacaoMec\ComplicacoesVentilacaoMecController@store');
                Route::get('pacientes/{pacienteId}/ventilacao-mecanica', 'ComplicacoesVentilacaoMec\ComplicacoesVentilacaoMecController@index');

                Route::get('/pacientes/{pacienteId}/evolucoes-diarias/{evolucaoId}', 'EvolucaoDiariaController@show');

                Route::post('/pacientes/{pacienteId}/iras', 'IRAS\IRASController@store');
                Route::get('/pacientes/{pacienteId}/iras', 'IRAS\IRASController@index');

                Route::post('/pacientes/{pacienteId}/suportes-respiratorios', 'SuporteRespiratorio\SuporteRespiratorioController@store');
                Route::get('/pacientes/{pacienteId}/suportes-respiratorios', 'SuporteRespiratorio\SuporteRespiratorioController@index');

                Route::post('/pacientes/{pacienteId}/desfecho', 'Desfecho\DesfechoController@store');
                Route::get('/pacientes/{pacienteId}/desfecho', 'Desfecho\DesfechoController@index');
            });
        });
        Route::get('/complicacoes/{complicacaoId}', 'Paciente\ComplicacaoController@show');

        Route::get('/atividades-profissionais', 'AtividadeProfissionalController@index');
        Route::get('/bairros', 'BairroController@index');
        Route::get('/cores', 'CorController@index');
        Route::get('/corticosteroides', 'CorticosteroideController@index');
        Route::get('/doencas', 'DoencaController@index');
        Route::get('/drogas', 'DrogaController@index');
        Route::get('/escolaridades', 'EscolaridadeController@index');
        Route::get('/estados-civis', 'EstadoCivilController@index');
        Route::get('/estados', 'EstadoController@index');
        Route::get('/instituicoes', 'InstituicaoController@index');
        Route::get('/municipios', 'MunicipioController@index');
        Route::get('/orgaos', 'OrgaoController@index');
        Route::get('/pcr-resultado', 'ResultadoPcrController@index');
        Route::get('/sintomas', 'SintomaController@index');
        Route::get('/sitios-rt-pcr', 'TipoSitiosController@index');
        Route::get('/cores', 'CorController@index');
        Route::get('/estados-civis', 'EstadoCivilController@index');
        Route::get('/escolaridades', 'EscolaridadeController@index');
        Route::get('/atividades-profissionais', 'AtividadeProfissionalController@index');
        Route::get('/tipos-transfusao', 'TipoTransfusaoController@index');
        Route::get('/tipos-complicacao-vm', 'TipoComplicacaoVMController@index');
        Route::get('/situacao-uso-drogas', 'SituacaoUsoDrogasController@index');
        Route::get('/suportes-respiratorios', 'SuporteRespiratorioController@index');
        Route::get('/tipos-doencas', 'TipoDoencaController@index');
        Route::get('/tipos-complicacoes', 'TipoComplicacaoController@index');
        Route::post('/drogas', 'DrogaController@store');
        Route::get('/tipos-iras', 'TipoIRASController@index');
        Route::get('/tipos-exames-complementares', 'TipoExamesComplementaresController@index');
        Route::get('/tipos-desfecho', 'TipoDesfechoController@index');
        Route::get('/tipos-auto-cuidado', 'TipoAutoCuidadoController@index');
        Route::get('/tipos-cuidado-paliativo', 'TipoCuidadoPaliativoController@index');
    });
});
