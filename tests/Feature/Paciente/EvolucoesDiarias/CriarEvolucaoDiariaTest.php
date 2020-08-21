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

    /**
     * @dataProvider possiveisValoresEvolucaoDiaria
    */
    public function testPossiveisValoresCamposEvolucaoDiaria($data, $erro)
    {
        $paciente = factory(Paciente::class)->create([
      'coletador_id' => $this->currentUser->id,
    ]);

        $response = $this->postJson("api/pacientes/{$paciente->id}/evolucoes-diarias", $data);
        $response->assertStatus(422);
        $response->assertJsonFragment([
      'message' => 'The given data was invalid.',
      'errors' => $erro
    ]);
    }

    public function possiveisValoresEvolucaoDiaria()
    {
        return [
      // Testa se o valor está entre 3 e 15
      [[
        'escala_glasgow' => 2,
        'data_evolucao' => '2020-04-14'
      ], ['escala_glasgow' => ['O campo escala glasgow deve ser entre 3 e 15.']]],

      // Testa se existe a data de evolucao
      [[], ['data_evolucao' => ['O campo data evolucao é obrigatório.']]],
    ];
    }
}
