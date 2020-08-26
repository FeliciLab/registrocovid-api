<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Complicacao;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Complicacao::class, function (Faker $faker) {
    return [
        'paciente_id' => 1,
        'tipo_complicacao_id' => 1,
        'data' => '2020-03-15',
        'data_termino' => '2020-05-15',
        'descricao' => 'descricao',
    ];
});
