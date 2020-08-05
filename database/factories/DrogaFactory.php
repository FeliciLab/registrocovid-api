<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Droga;
use Faker\Generator as Faker;

$factory->define(Droga::class, function (Faker $faker) {
    return [
        'descricao' => $faker->text(50)
    ];
});
