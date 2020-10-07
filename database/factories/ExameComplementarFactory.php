<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\ExameComplementar;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(ExameComplementar::class, function (Faker $faker) {

    return [
        "paciente_id" => 1,
        "data" => Carbon::now(),
        "tipo_exames_complementares_id" => 2,
        "resultado" => "Resultado do Exame"
    ];
});
