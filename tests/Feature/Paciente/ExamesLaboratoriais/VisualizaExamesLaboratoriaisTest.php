<?php

namespace Tests\Feature\Paciente\ExamesLaboratoriais;

use App\Models\ExameRtPcr;
use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VisualizaExamesLaboratoriaisTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testPacienteExiste()
    {
        $response = $this->get('api/pacientes/0/exames-laboratoriais');
        $response->assertStatus(422);
        $response->assertJsonFragment([
            "errors" => [
                "paciente_id" => ["O campo paciente id selecionado é inválido."]
            ]
        ]);
    }

    public function testPacienteNãoTemExamesLaboratoriais()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $response = $this->get("api/pacientes/{$paciente->id}/exames-laboratoriais");
        $response->assertStatus(404);
        $response->assertJsonFragment([
            "message" => "Paciente não possui exames laboratóriais cadastrada"
        ]);
    }

    public function testVisualizaExamesLaboratoriaisComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        factory(ExameRtPcr::class)->create([
            'paciente_id' => $paciente->id
        ]);

        $response = $this->get("api/pacientes/{$paciente->id}/exames-laboratoriais");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "exames_pcr"
        ]);
        $response->assertJsonStructure([
            "exames_teste_rapido"
        ]);
    }
}
