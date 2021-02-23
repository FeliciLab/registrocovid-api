<?php

namespace Tests\Feature\Paciente\ComplicacoesVentilacaoMec;

use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CadastroComplicacaoTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testCadastroComplicacaoComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $data = [
            "tipo_complicacao_id" => 1,
            "data_complicacao" => "2020-08-10",
            "descricao" => "descricao qualquer"
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/ventilacao-mecanica", $data);
        $response->assertStatus(201);
        $response->assertJsonFragment([
            "message" => "Complicação ventilação mecânica cadastrado com sucesso",
        ]);
        $response->assertJsonStructure([
            "ventilacao_mecanica"
        ]);
        // $response->assertJsonStructure([
        //     "transfusao_ocorrencia"
        // ]);
    }

    /**
     * @param $dados
     * @param $erro
     * @dataProvider cenariosValidacao
     */
    public function testValidaCampos($dados, $erro)
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $response = $this->postJson("api/pacientes/{$paciente->id}/ventilacao-mecanica", $dados);
        $response->assertStatus(422);
        $response->assertJsonFragment($erro);
    }

    public function cenariosValidacao()
    {
        return [
            [
                ['tipo_complicacao_id' => 'teste'],
                ['errors' => ['data_complicacao' => ['O campo data complicacao é obrigatório quando tipo complicacao id está presente.'], 'tipo_complicacao_id' => ['O campo tipo complicacao id deve ser um número inteiro.']]]
            ],
            [
                ['data_complicacao' => 0],
                ['data_complicacao' => ['O campo data complicacao não é uma data válida.']]
            ],
            [
                ['descricao' => 0],
                ['descricao' => ['O campo descricao deve ser uma string.']]
            ]
        ];
    }
}
