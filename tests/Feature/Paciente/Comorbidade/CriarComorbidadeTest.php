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
      'doencas' => [1,2,3],
      'orgaos' => [1,2]
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
  
  /**
   * @dataProvider possiveisValoresDoencas
  */
  public function testPossiveisValoresCamposDoenca($doencas, $erro)
  {

    $paciente = factory(Paciente::class)->create([
      'coletador_id' => $this->currentUser->id,
    ]);

    $data = [
      'doencas' => $doencas
    ];

    $response = $this->postJson("api/pacientes/{$paciente->id}/comorbidades", $data);
    $response->assertStatus(422);
    $response->assertJsonFragment([
      'message' => 'The given data was invalid.',
      'errors' => $erro
    ]);
  }

  public function possiveisValoresDoencas()
  {
    return [
      // Testa se é um array
      [0, ['doencas' => ['O campo doencas deve ser uma matriz.']]],
    
      // Testa se não é inteiro
      [['a'], ['doencas.0' => ['O campo doencas.0 deve ser um número inteiro.']]],

      // Testa se existe no banco
      [[0], ['doencas.0' => ['O campo doencas.0 selecionado é inválido.']]]
    ];
  }

  /**
   * @dataProvider possiveisValoresOrgaos
  */
  public function testPossiveisValoresCamposOrgao($orgaos, $erro)
  {

    $paciente = factory(Paciente::class)->create([
      'coletador_id' => $this->currentUser->id,
    ]);

    $data = [
      'orgaos' => $orgaos
    ];

    $response = $this->postJson("api/pacientes/{$paciente->id}/comorbidades", $data);
    $response->assertStatus(422);
    $response->assertJsonFragment([
      'message' => 'The given data was invalid.',
      'errors' => $erro
    ]);
  }

  public function possiveisValoresOrgaos()
  {
    return [
      // Testa se é um array
      [0, ['orgaos' => ['O campo orgaos deve ser uma matriz.']]],
    
      // Testa se não é inteiro
      [['a'], ['orgaos.0' => ['O campo orgaos.0 deve ser um número inteiro.']]],

      // Testa se existe no banco
      [[0], ['orgaos.0' => ['O campo orgaos.0 selecionado é inválido.']]]
    ];
  }
}