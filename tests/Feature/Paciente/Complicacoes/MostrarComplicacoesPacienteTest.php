<?php

namespace Tests\Feature\Paciente\Complicacoes;

use App\Models\Complicacao;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MostrarComplicacoesPacienteTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testMostrarComplicacoesVaziaComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/complicacoes");
        
        $response->assertOk();
        $response->assertJsonCount(0);
    }

    public function testMostrarComplicacoesComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        factory(Complicacao::class)->create([
            'paciente_id' => $paciente->id
        ]);

        factory(Complicacao::class)->create([
            'paciente_id' => $paciente->id
        ]);

        $response = $this->getJson("api/pacientes/{$paciente->id}/complicacoes");
        
        $response->assertOk();
        $response->assertJsonCount(2);
        $response->assertJsonStructure([[
            'id',
            'paciente_id',
            'tipo_complicacao',
            'data',
            'data_termino',
            'descricao',
            'menos_24h_uti',
            'glasglow_admissao_uti',
            'created_at',
            'updated_at',
        ]]);

        $response->assertJsonFragment([
            'tipo_complicacao' => [
                'id' => 1,
                'descricao' => 'UTI'
            ]
        ]);
    }
}
