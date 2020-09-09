<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Desfecho;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Desfecho::class, function (Faker $faker) {
    return [
        "tipo_desfecho_id" => 4,
        "data" => Carbon::now(),
        "obito_menos_24h" => false,
        "obito_em_vm" => true,
        "obito_em_uti" => false,
        "causa_obito" => "Causa do óbito desconhecida"
    ];
});
