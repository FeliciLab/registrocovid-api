<?php

namespace Tests\Feature\Paciente\ExamesComplementares;

use App\Models\ExameComplementar;
use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VisualizaExamesComplementaresTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testPacienteNãoTemExamesComplementares()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $response = $this->get("api/pacientes/{$paciente->id}/exames-complementares");
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "message" => "Paciente não possui exames complementares cadastrados."
        ]);
    }

    public function testMostraExamesComplementares()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        factory(ExameComplementar::class)->create([
            'paciente_id' => $paciente->id
        ]);

        $response = $this->get("api/pacientes/{$paciente->id}/exames-complementares");
        $response->assertStatus(200);
    }
}
