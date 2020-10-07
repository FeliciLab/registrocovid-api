<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\IRAS;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(IRAS::class, function (Faker $faker) {

    return [
        "paciente_id" => 1,
        "data" => Carbon::now(),
        "tipo_iras_id" => 2,
        "descricao" => "Descrição da infecção"
    ];
});