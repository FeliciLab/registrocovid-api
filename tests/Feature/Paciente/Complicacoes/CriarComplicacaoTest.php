<?php

namespace Tests\Feature\Paciente\Complicacoes;

use App\Models\Complicacao;
use App\Models\Paciente;
use Tests\TestCase;

class CriarComplicacaoTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->authenticated();
    }

    public function testComplicacaoCriadaComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
          'coletador_id' => $this->currentUser->id,
        ]);

        $data = [
          [
            'tipo_complicacao_id' => 1,
            'data' => '2020-04-15',
            'data_termino' => '2020-04-15',
          ],
          [
            'tipo_complicacao_id' => 1,
            'data' => '2020-04-15',
            'data_termino' => '2020-04-15',
          ]
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/complicacoes", $data);

        $response->assertStatus(201);
        $response->assertJsonStructure([
          [
            'id',
            'paciente_id',
            'data',
            'data_termino',
          ]
        ]);
    }

    // /**
    //  * @dataProvider possiveisValoresEvolucaoDiaria
    // */
    // public function testPossiveisValoresCamposEvolucaoDiaria($data, $erro)
    // {
    //     $paciente = factory(Paciente::class)->create([
    //   'coletador_id' => $this->currentUser->id,
    // ]);

    //     $response = $this->postJson("api/pacientes/{$paciente->id}/evolucoes-diarias", $data);
    //     $response->assertStatus(422);
    //     $response->assertJsonFragment([
    //   'message' => 'The given data was invalid.',
    //   'errors' => $erro
    // ]);
    // }

    // public function possiveisValoresEvolucaoDiaria()
    // {
    //     return [
    //   // Testa se o valor está entre 3 e 15
    //   [[
    //     'escala_glasgow' => 2,
    //     'data_evolucao' => '2020-04-14'
    //   ], ['escala_glasgow' => ['O campo escala glasgow deve ser entre 3 e 15.']]],

    //   // Testa se existe a data de evolucao
    //   [[], ['data_evolucao' => ['O campo data evolucao é obrigatório.']]],
    // ];
    // }
}
