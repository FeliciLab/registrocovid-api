<?php

namespace Tests\Feature\Paciente\EvolucaoDiariaEspecifica;

use App\Models\EvolucaoDiaria;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MostrarEvolucaoDiariaEspecificaTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testMostrarNaoEncontradaEvolucaoDiariaComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/evolucoes-diarias/0");
        
        $response->assertStatus(404);
    }

    public function testMostrarEvolucaoDiariaEspecificaComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $evolucao = factory(EvolucaoDiaria::class)->create([
            'paciente_id' => $paciente->id
        ]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/evolucoes-diarias/{$evolucao->id}");

        $response->assertOk();
        $this->assertEquals($response->getData(), json_decode($evolucao));
        $response->assertJsonStructure([
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
            "ausculta_pulmonar",
            "oximetria",
            "escala_glasgow",
            "created_at",
            "updated_at",
        ]);
    }
}
