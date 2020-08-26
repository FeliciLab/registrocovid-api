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

    /**
     * @dataProvider possiveisValoresComplicacao
    */
    public function testPossiveisValoresCamposComplicacao($data, $erro)
    {
        $paciente = factory(Paciente::class)->create([
      'coletador_id' => $this->currentUser->id,
    ]);

        $response = $this->postJson("api/pacientes/{$paciente->id}/complicacoes", $data);
        $response->assertStatus(422);
        $response->assertJsonFragment([
          'message' => 'The given data was invalid.',
          'errors' => $erro
        ]);
    }

    public function possiveisValoresComplicacao()
    {
      return [
      // Testa se existe a data
      [[['tipo_complicacao_id' => 1]], ['0.data' => ['O campo 0.data é obrigatório.']]],

      // Testa se existe o tipo de complicacao
      [[['data' => '2020-03-15']], ['0.tipo_complicacao_id' => ['O campo 0.tipo_complicacao_id é obrigatório.']]],
      ];
    }
}
