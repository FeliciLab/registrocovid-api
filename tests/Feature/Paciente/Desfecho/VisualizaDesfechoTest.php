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
            'message' => 'Paciente não possui desfechos cadastrado',
            'desfechos' => []
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
            'desfechos'
        ]);
    }

    public function testRetornaUltimoDesfechoPaciente()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        factory(Desfecho::class)->create([
            'paciente_id' => $paciente->id,
            'data' => date_create("2020-10-16")
        ]);
        factory(Desfecho::class)->create([
            'paciente_id' => $paciente->id,
            'data' => date_create("2020-10-10")
        ]);

        $response = $this->get("api/pacientes/{$paciente->id}/desfecho/last");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'desfecho'
        ]);
        $response->assertJsonFragment(["data" => "2020-10-16"]);
    }
}
