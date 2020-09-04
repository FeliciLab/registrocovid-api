<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SuporteRespiratorio;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(SuporteRespiratorio::class, function (Faker $faker) {
    return [
        "tipo_suporte_id" => 1,
        "parametro" => 100,
        "data_inicio" => Carbon::now(),
        "data_termino" => Carbon::now(),
        "menos_24h_vmi" => false
    ];
});
