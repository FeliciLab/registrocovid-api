<?php

namespace Tests\Feature\Paciente\Desfecho;

use App\Models\Desfecho;
use Tests\TestCase;
use App\Models\Paciente;

class VisualizaDesfechoTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testPacienteNãoTemDesfechoCadastrado()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $response = $this->json("GET", "api/pacientes/{$paciente->id}/desfecho");
        $response->assertJsonFragment([
            'message' => 'Paciente não possui desfecho cadastrado',
            'desfecho' => []
        ]);
    }

    public function testRetornaDesfechoPaciente()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        factory(Desfecho::class)->create([
            'paciente_id' => $paciente->id
        ]);

        $response = $this->get("api/pacientes/{$paciente->id}/desfecho");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data'
        ]);
    }
}
