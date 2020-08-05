<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comorbidade;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Comorbidade::class, function (Faker $faker) {
    return [
      'diabetes' => false,
      'obesidade' => true,
      'hipertensao' => true,
      'doenca_cardiaca' => true,
      'doenca_vascular_periferica' => true,
      'doenca_pulmonar_cronica' => true,
      'doenca_reumatologica' => true,
      'neoplasia' => true,
      'quimioterapia' => false,
      'HIV' => true,
      'transplantado' => true,
      'corticosteroide' => true,
      'doenca_autoimune' => false,
      'doenca_renal_cronica' => true,
      'doenca_hepatica_cronica' => true,
      'doenca_neurologica' => false,
      'tuberculose' => true,
      'gestacao' => true,
      'gestacao_semanas' => 12,
      'puerperio' => true,
      'puerperio_semanas' => 15,
      'outras_condicoes' => false,
      'medicacoes' => true,
    ];
});
