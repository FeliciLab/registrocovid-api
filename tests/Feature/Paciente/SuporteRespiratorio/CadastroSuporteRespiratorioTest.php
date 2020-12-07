<?php

namespace Tests\Feature\Paciente\SuporteRespiratorio;

use App\Models\Paciente;
use Tests\TestCase;
use Carbon\Carbon;


class CadastroSuporteRespiratorioTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testSuporteRespiratorioComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $data = [
            [
                "tipo_suporte_id" => 1,
                "parametro" => 100,
                "data_inicio" => Carbon::now(),
                "menos_24h_vmi" => false
            ],
            [
                "tipo_suporte_id" => 10,
                "data_pronacao" => Carbon::now(),
                "quantidade_horas" => 12
            ]
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/suportes-respiratorios", $data);
        $response->assertStatus(201);
        $response->assertJsonFragment([
            "message" => "Suportes Respiratorios cadastrado com sucesso",
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

        $response = $this->postJson("api/pacientes/{$paciente->id}/suportes-respiratorios", $dados);
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
                ['tipo_suporte_id' => 0],
                ['errors' => ['tipo_suporte_id.data_inicio' => ['O campo tipo_suporte_id.data_inicio é obrigatório.'], 'tipo_suporte_id.tipo_suporte_id' => ['O campo tipo_suporte_id.tipo_suporte_id é obrigatório.']]]
            ],
            [
                ['data_inicio' => 0],
                ['errors' => ['data_inicio.data_inicio' => ['O campo data_inicio.data_inicio é obrigatório.'], 'data_inicio.tipo_suporte_id' => ['O campo data_inicio.tipo_suporte_id é obrigatório.']]]
            ],
        ];
    }
}
