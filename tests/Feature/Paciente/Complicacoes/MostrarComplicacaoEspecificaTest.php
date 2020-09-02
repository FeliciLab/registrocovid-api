<?php

namespace Tests\Feature\Paciente\Complicacoes;

use App\Models\Complicacao;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MostrarComplicacaoEspecificaTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }
    
    public function testMostrarComplicacaoComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $complicacao = factory(Complicacao::class)->create([
            'paciente_id' => $paciente->id
        ]);


        $response = $this->getJson("api/complicacoes/{$complicacao->id}");
        
        $response->assertOk();
        $response->assertJsonStructure([
            'id',
            'paciente_id',
            'data',
            'data_termino',
            'descricao',
            'menos_24h_uti',
            'glasglow_admissao_uti',
            'created_at',
            'updated_at',
        ]);

        $response->assertJsonFragment([
            'tipo_complicacao' => [
                'id' => 1,
                'descricao' => 'UTI'
            ]
        ]);
    }
}
