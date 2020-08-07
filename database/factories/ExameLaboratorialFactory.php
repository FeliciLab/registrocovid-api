<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\ExameRtPcr;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(ExameRtPcr::class, function (Faker $faker) {
    return [
        "data_coleta" => Carbon::now(),
        "sitio_tipo_id" => 2,
        "data_resultado" => Carbon::now(),
        "rt_pcr_resultado_id" => 3
    ];
});
