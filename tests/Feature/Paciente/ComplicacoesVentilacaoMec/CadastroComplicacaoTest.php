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
            "tipo_complicacao_id" => 4,
            "data_complicacao" => "2020-08-10",
            "descricao" => "descricao qualquer",
            "tipo_transfusao_id" => 5,
            "data_transfusao" => "2020-08-18",
            "volume_transfusao" => 6.2
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/ventilacao-mecanica", $data);
        $response->assertStatus(201);
        $response->assertJsonFragment([
            "message" => "Complicação ventilação mecânica cadastrado com sucesso",
        ]);
        $response->assertJsonStructure([
            "ventilacao_mecanica"
        ]);
        $response->assertJsonStructure([
            "transfusao_ocorrencia"
        ]);
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
                [ 'tipo_complicacao_id' => 'teste'],
                [ 'errors' => ['data_complicacao' => ['O campo data complicacao é obrigatório quando tipo complicacao id está presente.'], 'tipo_complicacao_id' => ['O campo tipo complicacao id deve ser um número inteiro.']], 'message' => 'Campos inválidos.' ]
            ],
            [
                [ 'data_complicacao' => 0],
                [ 'data_complicacao' => ['O campo data complicacao não é uma data válida.'] ]
            ],
            [
                [ 'descricao' => 0],
                [ 'descricao' => ['O campo descricao deve ser uma string.'] ]
            ],
            [
                [ 'tipo_transfusao_id' => 0],
                [ 'errors' => ['data_transfusao' => ['O campo data transfusao é obrigatório quando tipo transfusao id está presente.'], 'tipo_transfusao_id' => ['O campo tipo transfusao id selecionado é inválido.']], 'message' => 'Campos inválidos.' ]
            ],
            [
                [ 'data_transfusao' => 'teste'],
                [ 'data_transfusao' => ['O campo data transfusao não é uma data válida.'] ]
            ],
            [
                [ 'volume_transfusao' => 'teste'],
                [ 'errors' => ['volume_transfusao' => ['O campo volume transfusao tem um formato inválido.']], 'message' => 'Campos inválidos.' ]
            ]
        ];
    }
}
