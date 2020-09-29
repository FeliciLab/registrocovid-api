<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SuporteRespiratorio;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(SuporteRespiratorio::class, function (Faker $faker) {
    return [
        "tipo_suporte_id" => 1,
        "fluxo_o2" => 100,
        "concentracao_o2" => 100,
        "fluxo_sangue" => 100,
        "fluxo_gasoso" => 100,
        "fio2" => 100,
        "data_inicio" => Carbon::now(),
        "data_termino" => Carbon::now(),
        "menos_24h_vmi" => false
    ];
});
