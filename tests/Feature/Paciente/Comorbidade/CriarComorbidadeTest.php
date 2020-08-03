<?php

namespace Tests\Feature\Paciente\Comorbidade;

use App\Models\Comorbidade;
use App\Models\Paciente;
use Tests\TestCase;

class CriarComorbidadeTest extends TestCase
{
  public function setUp(): void
  {
      parent::setUp();
      $this->authenticated();
  }

  public function testComorbidadeCriadaComSucesso()
  {
    $paciente = factory(Paciente::class)->create([
      'coletador_id' => $this->currentUser->id,
    ]);

    $data = [
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

    $response = $this->postJson("api/pacientes/{$paciente->id}/comorbidades", $data);
    $response->assertStatus(201);
    $response->assertJsonStructure([
      'id',
      'paciente_id',
      'diabetes',
      'obesidade',
      'hipertensao',
      'doenca_cardiaca',
      'doenca_vascular_periferica',
      'doenca_pulmonar_cronica',
      'doenca_reumatologica',
      'neoplasia',
      'quimioterapia',
      'HIV',
      'transplantado',
      'corticosteroide',
      'doenca_autoimune',
      'doenca_renal_cronica',
      'doenca_hepatica_cronica',
      'doenca_neurologica',
      'tuberculose',
      'gestacao',
      'gestacao_semanas',
      'puerperio',
      'puerperio_semanas',
      'outras_condicoes',
      'medicacoes',
      'created_at',
      'updated_at',
    ]);
  }

  public function testComorbidadeJaExiste()
  {
    $paciente = factory(Paciente::class)->create([
      'coletador_id' => $this->currentUser->id,
    ]);

    factory(Comorbidade::class)->create([
      'paciente_id' => $paciente->id
    ]);

    $response = $this->postJson("api/pacientes/{$paciente->id}/comorbidades");
    $response->assertStatus(400);
    $response->assertJsonFragment([
      "message" => "Paciente já possui comorbidade.",
      "errors" => []
    ]);
  }
}