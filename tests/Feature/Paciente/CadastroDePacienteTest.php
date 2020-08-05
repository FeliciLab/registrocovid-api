<?php

namespace Tests\Feature\Paciente;

use App\Models\Paciente;
use Carbon\Carbon;
use Tests\TestCase;

class CadastroDePacienteTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testValidacaoDosCampos()
    {
        $response = $this->postJson('api/pacientes', []);
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'prontuario',
                'data_internacao'
            ]
        ]);
        $response->assertJsonFragment([
            'prontuario' => ['O campo prontuario é obrigatório.']
        ]);
        $response->assertJsonFragment([
            'data_internacao' => ['O campo data internacao é obrigatório.']
        ]);
    }

    public function testPacienteJaExistente()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);
        $response = $this->postJson('api/pacientes', [
            'prontuario' => $paciente->prontuario,
            'data_internacao' => Carbon::now()->toString()
        ]);
        $response->assertStatus(422);
        $response->assertJsonFragment(
            ['prontuario' => ['O campo prontuario já está sendo utilizado.']]
        );
    }

    public function testFalhaTiposSuporteRespiratorio()
    {
        $response = $this->postJson('api/pacientes', [
            'prontuario' => 123,
            'data_internacao' => Carbon::now()->toString(),
            'tipos_suporte_respiratorio' => 'errado'
        ]);
        $response->assertStatus(422);
        $response->assertJsonFragment([
            'tipos_suporte_respiratorio' => ['O campo tipos suporte respiratorio deve ser uma matriz.']
        ]);
    }

    public function testFalhaTiposSuporteRespiratorioFormatoDoCampo()
    {
        $response = $this->postJson('api/pacientes', [
            'prontuario' => 123,
            'data_internacao' => Carbon::now()->toString(),
            'tipos_suporte_respiratorio' => [
                ['errado' => true]
            ]
        ]);
        $response->assertStatus(422);
        $response->assertJsonFragment([
            'tipos_suporte_respiratorio.0.id' => ['O campo tipos_suporte_respiratorio.0.id é obrigatório quando tipos suporte respiratorio está presente.']
        ]);
    }

    public function testCriarPacienteComSucesso()
    {
        $response = $this->postJson('api/pacientes', [
            'prontuario' => 123,
            'data_internacao' => Carbon::now()->toString(),
            'tipos_suporte_respiratorio' => [
                ['id' => 1]
            ]
        ]);
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'message',
            'paciente' => [
                'prontuario',
                'coletador_id',
                'instituicao_id',
                'updated_at',
                'created_at',
                'id'
            ]
        ]);
    }
}
