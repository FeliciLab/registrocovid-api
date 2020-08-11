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

    public function testMostrarEvolucoesDiariasVaziaComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/evolucoes-diarias");
        
        $response->assertOk();
        $response->assertJsonCount(0);
    }

    public function testMostrarEvolucoesDiariasComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        factory(EvolucaoDiaria::class)->create([
            'paciente_id' => $paciente->id
        ]);

        factory(EvolucaoDiaria::class)->create([
            'paciente_id' => $paciente->id
        ]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/evolucoes-diarias");
        
        $response->assertOk();
        $response->assertJsonCount(2);
        $response->assertJsonStructure([[
            "id",
            "paciente_id",
            "data_evolucao",
            "temperatura",
            "frequencia_respiratoria",
            "peso",
            "altura",
            "pressao_sistolica",
            "pressao_diastolica",
            "frequencia_cardiaca",
            "ascultura_pulmonar",
            "oximetria",
            "escala_glasgow",
            "created_at",
            "updated_at",
        ]]);
    }
}
