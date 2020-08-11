<?php

namespace Tests\Feature\Paciente\EvolucoesDiarias;

use App\Models\EvolucaoDiaria;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MostrarEvolucoesDiariasPacienteTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testMostrarEvolucoesDiariasDoPaciente()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/evolucao-diaria");
        
        $response->assertOk();
        $response->assertJsonCount(0);
    }

}
