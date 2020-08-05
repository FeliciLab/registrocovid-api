<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Historico;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Historico::class, function (Faker $faker) {
    return [
        'tabagismo' => false,
        'etilismo' => false,
    ];
});
