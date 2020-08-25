<?php

namespace Tests\Feature\Paciente\Comorbidade;

use App\Models\Comorbidade;
use App\Models\Paciente;
use Tests\TestCase;

class MostrarComorbidadeTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->authenticated();
    }

    public function testPacienteNaoPossuiComorbidade()
    {
        $paciente = factory(Paciente::class)->create([
        'coletador_id' => $this->currentUser->id,
    ]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/comorbidades");
        $response->assertNoContent();
    }

    public function testMostrarComorbidadeComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
          'coletador_id' => $this->currentUser->id,
      ]);

        factory(Comorbidade::class)->create([
          'paciente_id' => $paciente->id
      ]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/comorbidades");
        $response->assertOk();
        $response->assertJsonStructure([
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
      ]);
    }

    public function testMostrarComorbidadeContendoDoencasComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
          'coletador_id' => $this->currentUser->id,
      ]);
      
        $comorbidade = factory(Comorbidade::class)->create([
          'paciente_id' => $paciente->id
      ]);

        $comorbidade->doencas()->sync([1, 2, 8]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/comorbidades");
        $response->assertOk();
        $response->assertJsonStructure([
          'id',
          'paciente_id',
          'doencas',
          'created_at',
          'updated_at'
      ]);
        $response->assertJsonFragment([
          'id' => 8,
          'descricao' => 'Asma'
      ]);
    }

    public function testMostrarComorbidadeContendoCorticosteroidesComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
          'coletador_id' => $this->currentUser->id,
      ]);
      
        $comorbidade = factory(Comorbidade::class)->create([
          'paciente_id' => $paciente->id
      ]);
      
        $comorbidade->corticosteroides()->sync([1, 2, 3]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/comorbidades");
        $response->assertOk();
        $response->assertJsonStructure([
          'id',
          'paciente_id',
          'corticosteroides',
          'created_at',
          'updated_at'
      ]);
        $response->assertJsonFragment([
          'id' => 1,
          'descricao' => 'Prednisona > 40 mg/dia'
      ]);
    }

    public function testMostrarComorbidadeContendoOrgaosComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
          'coletador_id' => $this->currentUser->id,
      ]);
      
        $comorbidade = factory(Comorbidade::class)->create([
          'paciente_id' => $paciente->id
      ]);
      
        $comorbidade->orgaos()->sync([1, 2, 3]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/comorbidades");
        $response->assertOk();
        $response->assertJsonStructure([
          'id',
          'paciente_id',
          'orgaos',
          'created_at',
          'updated_at'
      ]);
        $response->assertJsonFragment([
          'id' => 1,
          'descricao' => 'Coracao'
      ]);
    }
}
