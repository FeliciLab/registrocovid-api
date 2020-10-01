<?php

namespace Tests\Feature\Paciente\SuporteRespiratorio;

use Tests\TestCase;
use App\Models\Paciente;
use App\Models\SuporteRespiratorio;
use Carbon\Carbon;

class VisualizaSuporteRespiratorioTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testListaTiposSuportesRespiratorios()
    {
        $response = $this->json('GET', 'api/suportes-respiratorios');
        $response->assertStatus(200);
        $response->assertJsonCount(11);
        $response->assertJsonFragment([
            "id" => 1,
            "nome" => "Catéter nasal de baixo fluxo",
        ]);
    }

    public function testPacienteNãoTemSuportesRespiratorios()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $response = $this->json("GET", "api/pacientes/{$paciente->id}/suportes-respiratorios");
        $response->assertJsonFragment([
            'message' => 'Paciente não possui suportes respiratorios cadastradas',
            'suportes_respiratorios' => []
        ]);
    }

    public function testSuportesRespiratoriosPaciente()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        factory(SuporteRespiratorio::class)->create([
            'paciente_id' => $paciente->id
        ]);

        $response = $this->get("api/pacientes/{$paciente->id}/suportes-respiratorios");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'tratamento_pronacao' => []
        ]);
        $response->assertJsonStructure([
            'tratamento_inclusao_desmame'
        ]);
        $response->assertJsonStructure([
            'suporte_respiratorio' => []
        ]);
    }
}
