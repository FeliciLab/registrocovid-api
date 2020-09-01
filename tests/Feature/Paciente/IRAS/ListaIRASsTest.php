<?php

namespace Tests\Feature\Paciente\IRAS;

use App\Models\IRAS;
use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListaIRASsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testPacienteNãoTemIRASsCadastradas()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $response = $this->get("api/pacientes/{$paciente->id}/iras");
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "message" => "Paciente não possui IRASs cadastradas."
        ]);
    }

    public function testMostraIRASs()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        factory(IRAS::class)->create([
            'paciente_id' => $paciente->id
        ]);

        $response = $this->get("api/pacientes/{$paciente->id}/iras");
        $response->assertStatus(200);
    }
}