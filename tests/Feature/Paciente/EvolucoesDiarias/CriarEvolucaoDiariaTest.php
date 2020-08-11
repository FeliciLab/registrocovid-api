<?php

namespace Tests\Feature\Paciente\EvolucaoDiaria;

use App\Models\EvolucaoDiaria;
use App\Models\Paciente;
use Tests\TestCase;

class CriarEvolucaoDiariaTest extends TestCase
{
  public function setUp(): void
  {
      parent::setUp();
      $this->authenticated();
  }

  public function testEvolucaoDiariaCriadaComSucesso()
  {
    $paciente = factory(Paciente::class)->create([
      'coletador_id' => $this->currentUser->id,
    ]);

    $data = [
      'paciente_id' => $paciente->id,
      'data_evolucao' => '2020-05-23',
      'temperatura' => 32.0,
      'frequencia_respiratoria' => 23,
      'peso' => 70.2,
      'altura' => 180,
      'pressao_sistolica' => 23,
      'pressao_diastolica' => 26,
      'frequencia_cardiaca' => 12,
      'ascultura_pulmonar' => 'teste',
      'oximetria' => 0.8,
      'escala_glasgow' => 4,
    ];

    $response = $this->postJson("api/pacientes/{$paciente->id}/evolucoes-diarias", $data);

    $response->assertStatus(201);
    $response->assertJsonStructure([
      'id',
      'paciente_id',
      'data_evolucao',
      'temperatura',
      'frequencia_respiratoria',
      'peso',
      'altura',
      'pressao_sistolica',
      'pressao_diastolica',
      'frequencia_cardiaca',
      'ascultura_pulmonar',
      'oximetria',
      'escala_glasgow',
    ]);
  }

  // /**
  //  * @dataProvider possiveisValoresCorticosteroides
  // */
  // public function testPossiveisValoresCamposCorticosteroide($corticosteroides, $erro)
  // {

  //   $paciente = factory(Paciente::class)->create([
  //     'coletador_id' => $this->currentUser->id,
  //   ]);

  //   $data = [
  //     'corticosteroides' => $corticosteroides
  //   ];

  //   $response = $this->postJson("api/pacientes/{$paciente->id}/comorbidades", $data);
  //   $response->assertStatus(422);
  //   $response->assertJsonFragment([
  //     'message' => 'The given data was invalid.',
  //     'errors' => $erro
  //   ]);
  // }

  // public function possiveisValoresCorticosteroides()
  // {
  //   return [
  //     // Testa se é um array
  //     [0, ['corticosteroides' => ['O campo corticosteroides deve ser uma matriz.']]],
    
  //     // Testa se não é inteiro
  //     [['a'], ['corticosteroides.0' => ['O campo corticosteroides.0 deve ser um número inteiro.']]],

  //     // Testa se existe no banco
  //     [[0], ['corticosteroides.0' => ['O campo corticosteroides.0 selecionado é inválido.']]]
  //   ];
  // }
  // /**
  //  * @dataProvider possiveisValoresJson
  // */
  // public function testPossiveisValoresJson($data, $erro)
  // {

  //   $paciente = factory(Paciente::class)->create([
  //     'coletador_id' => $this->currentUser->id,
  //   ]);

  //   $response = $this->postJson("api/pacientes/{$paciente->id}/comorbidades", $data);
  //   $response->assertStatus(422);
  //   $response->assertJsonFragment([
  //     'errors' => $erro
  //   ]);
  // }

  // public function possiveisValoresJson()
  // {
  //   return [
  //     // Testa se é um array
  //     [['outras_condicoes' => 0], ['outras_condicoes' => ['O campo outras condicoes deve ser uma matriz.']]],
    
  //     // Testa se não é string
  //     [['outras_condicoes' => [0]], ['outras_condicoes.0' => ['O campo outras_condicoes.0 deve ser uma string.']]],

  //     // Testa se é um array
  //     [['medicacoes' => 0], ['medicacoes' => ['O campo medicacoes deve ser uma matriz.']]],
    
  //     // Testa se não é string
  //     [['medicacoes' => [0]], ['medicacoes.0' => ['O campo medicacoes.0 deve ser uma string.']]],
  //   ];
  // }
}