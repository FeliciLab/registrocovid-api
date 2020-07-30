<?php

namespace Tests\Feature\Paciente\Historico;

use App\Models\Historico;
use App\Models\Paciente;
use Tests\TestCase;

class MostrarHistoricoTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->authenticated();
    }

    public function testPacienteNaoExiste()
    {
        $response = $this->getJson("api/pacientes/0/historico");
        $response->assertStatus(422);
        $response->assertJsonFragment([
            "errors" => [
                "paciente_id" => ["O campo paciente id selecionado é inválido."]
            ]
        ]);
    }

    public function testPacienteNaoPossuiHistorico()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id,
        ]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/historico");
        $response->assertNotFound();
        $response->assertJson([
            'message' => 'Histórico não encontrado.',
            'errors' => [
                'paciente_id' => ['Não existe histórico para o paciente.']
            ]
        ]);
    }

    public function testMostrarHistoricoComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id,
        ]);
        factory(Historico::class)->create([
            'paciente_id' => $paciente->id
        ]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/historico");
        $response->assertOk();
        $response->assertJsonStructure([
            'id',
            'paciente_id',
            'tabagismo',
            'etilismo',
            'drogas',
            'created_at',
            'updated_at'
        ]);
    }

    public function testMostrarHistoricoContendoDrogasComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id,
        ]);
        $historico = factory(Historico::class)->create([
            'paciente_id' => $paciente->id
        ]);

        $historico->drogas()->sync([1, 2, 3]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/historico");
        $response->assertOk();
        $response->assertJsonStructure([
            'id',
            'paciente_id',
            'tabagismo',
            'etilismo',
            'drogas',
            'created_at',
            'updated_at'
        ]);
        $response->assertJsonFragment([
            'id' => 1,
            'descricao' => 'Maconha'
        ]);
    }
}
