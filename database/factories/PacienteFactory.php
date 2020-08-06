<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Paciente;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Paciente::class, function (Faker $faker) {
    return [
        'prontuario' => 1,
        'data_internacao' => Carbon::now(),
        'instituicao_primeiro_atendimento_id' => 1,
        'instituicao_refererencia_id' => 1,
        'data_atendimento_referencia' => Carbon::now(),
        'suporte_respiratorio' => false,
        'reinternacao' => false,
        'coletador_id' => 1,
        'instituicao_id' => 1,
        'caso_confirmado' => false,
        'data_inicio_sintomas' => Carbon::now()
    ];
});
