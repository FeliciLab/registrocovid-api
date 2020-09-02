<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\TratamentoSuporte;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(TratamentoSuporte::class, function (Faker $faker) {
    return [
        "data_inicio" => Carbon::now(),
        "data_termino" => Carbon::now(),
        "motivo_hemodialise" => "sei la",
        "frequencia_hemodialise" => "tbm não sei"
    ];
});
