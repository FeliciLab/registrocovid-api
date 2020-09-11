<?php

namespace Tests\Feature\Paciente\Desfecho;

use App\Models\Desfecho;
use Tests\TestCase;
use Carbon\Carbon;
use App\Models\Paciente;

class CadastroDesfechoTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testDesfechoObitoJaExiste()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        factory(Desfecho::class)->create([
            'paciente_id' => $paciente->id
        ]);

        $data = [
            [
                "tipo_desfecho_id" => 3,
                "data" => Carbon::now(),
                "obito_menos_24h" => false,
                "obito_em_vm" => true,
                "obito_em_uti" => false,
                "causa_obito" => "Causa do óbito desconhecida",
                "tipo_cuidado_paliativo_id" => 2
            ]
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/desfecho", $data);
        $response->assertStatus(200);
        $response->assertJsonFragment(['message' => 'Desfecho óbito já existe']);
    }

    public function testDesfechoComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $data = [
            [
                "tipo_desfecho_id" => 1,
                "tipo_autocuidado_id" => 1,
                "tipo_cuidado_paliativo_id" => 3,
                "data" => Carbon::now()
            ],
            [
                "tipo_desfecho_id" => 2,
                "instituicao_transferencia_id" => 1,
                "tipo_cuidado_paliativo_id" => 3,
                "data" => Carbon::now()
            ],
            [
                "tipo_desfecho_id" => 3,
                "tipo_cuidado_paliativo_id" => 3,
                "data" => Carbon::now()
            ]
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/desfecho", $data);
        $response->assertStatus(201);
        $response->assertJsonFragment([
            "message" => "Desfecho cadastrado com sucesso",
        ]);
    }

    /**
     * @dataProvider cenariosValidacao
     */
    public function testValidaCampos($dados, $erro)
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $response = $this->postJson("api/pacientes/{$paciente->id}/desfecho", $dados);
        $response->assertStatus(422);
        $response->assertJsonFragment($erro);
    }

    /**
     * @return array
     */
    public function cenariosValidacao(): array
    {
        return [
            [
                ['tipo_desfecho_id' => 'teste'],
                ['errors' => ['tipo_desfecho_id.data' => ['O campo tipo_desfecho_id.data é obrigatório.'], 'tipo_desfecho_id.tipo_desfecho_id' => ['O campo tipo_desfecho_id.tipo_desfecho_id é obrigatório.']]]
            ],
            [
                ['tipo_autocuidado_id' => 'teste'],
                ['errors' => ['tipo_autocuidado_id.data' => ['O campo tipo_autocuidado_id.data é obrigatório.'], 'tipo_autocuidado_id.tipo_desfecho_id' => ['O campo tipo_autocuidado_id.tipo_desfecho_id é obrigatório.']]]
            ],
            [
                ['data' => 0],
                ['errors' => ['data.data' => ['O campo data.data é obrigatório.'], 'data.tipo_desfecho_id' => ['O campo data.tipo_desfecho_id é obrigatório.']]]
            ]
        ];
    }
}
