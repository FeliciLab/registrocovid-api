<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EvolucaoDiaria;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(EvolucaoDiaria::class, function (Faker $faker) {
    return [
        'paciente_id' => 1,
        'data_evolucao' => '2020-05-15',
        'temperatura' => 1.0,
        'frequencia_respiratoria' => 1,
        'peso' => 60.2,
        'altura' => 170,
        'pressao_sistolica' => 5,
        'pressao_diastolica' => 15,
        'frequencia_cardiaca' => 82,
        'ascultura_pulmonar' => 'teste',
        'oximetria' => 0.8,
        'escala_glasgow' => 12,
    ];
});
