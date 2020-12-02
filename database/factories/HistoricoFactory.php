<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Historico;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Historico::class, function (Faker $faker) {
    return [
        'situacao_uso_drogas_id' => 1,
        'situacao_tabagismo_id' => 1,
        'situacao_etilismo_id' => 1
    ];
});
