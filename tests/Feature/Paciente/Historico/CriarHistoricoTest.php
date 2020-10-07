<?php

namespace Tests\Feature\Paciente\Historico;

use App\Models\Historico;
use App\Models\Paciente;
use Tests\TestCase;

class CriarHistoricoTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->authenticated();
    }

    public function testPacienteNaoExiste()
    {
        $response = $this->postJson("api/pacientes/0/historico", []);
        $response->assertStatus(422);
        $response->assertJsonFragment([
        "errors" => [
            "paciente_id" => ["O campo paciente id selecionado é inválido."]
        ]
    ]);
    }

    public function testHistoricoJaExiste()
    {
        $paciente = factory(Paciente::class)->create([
      'coletador_id' => $this->currentUser->id,
    ]);
    
        factory(Historico::class)->create([
      'paciente_id' => $paciente->id
    ]);

        $response = $this->postJson("api/pacientes/{$paciente->id}/historico", []);
        $response->assertStatus(400);
        $response->assertJsonFragment([
      "message" => "Paciente já possui histórico.",
      "errors" => []
    ]);
    }

    public function testSituacaoUsoDrogaExiste()
    {
        $paciente = factory(Paciente::class)->create([
      'coletador_id' => $this->currentUser->id,
    ]);

        $data = [
      "situacao_uso_drogas_id" => 0
    ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/historico", $data);
        $response->assertStatus(422);
        $response->assertJsonFragment([
      "message" => "The given data was invalid.",
      "errors" => [
        "situacao_uso_drogas_id" => ["O campo situacao uso drogas id selecionado é inválido."]
      ]
    ]);
    }

    /**
     * @dataProvider possiveisValoresDrogas
    */
    public function testPossiveisValoresCamposDroga($drogas, $erro)
    {
        $paciente = factory(Paciente::class)->create([
      'coletador_id' => $this->currentUser->id,
    ]);

        $data = [
      'situacao_uso_drogas_id' => 1,
      'drogas' => $drogas
    ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/historico", $data);
        $response->assertStatus(422);
        $response->assertJsonFragment([
      'message' => 'The given data was invalid.',
      'errors' => $erro
    ]);
    }

    public function possiveisValoresDrogas()
    {
        return [
      // Testa se é um array
      [0, ['drogas' => ['O campo drogas deve ser uma matriz.']]],
    
      // Testa se não é inteiro
      [['a'], ['drogas.0' => ['O campo drogas.0 deve ser um número inteiro.']]],

      // Testa se existe no banco
      [[0], ['drogas.0' => ['O campo drogas.0 selecionado é inválido.']]]
    ];
    }

    public function testHistoricoCriadoComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
      'coletador_id' => $this->currentUser->id,
    ]);

        $data = [
      'situacao_uso_drogas_id' => 1,
      'tabagismo' => false,
      'etilismo' => false,
      'drogas' => [1,2,3]
    ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/historico", $data);
        $response->assertStatus(201);
        $response->assertJsonStructure([
      'id',
      'paciente_id',
      'tabagismo',
      'etilismo',
      'created_at',
      'updated_at'
    ]);
    }
}
