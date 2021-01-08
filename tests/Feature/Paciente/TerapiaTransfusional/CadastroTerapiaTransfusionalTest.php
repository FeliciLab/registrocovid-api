<?php

namespace Tests\Feature\Paciente\TerapiaTransfusional;

use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CadastroTerapiaTransfusionalTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testCadastroTerapiaTransfusionalComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $data = [
            "tipo_transfusao_id" => 1,
            "data_transfusao" => "2020-08-10",
            "volume_transfusao" => 1
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/terapia-transfusional", $data);
        $response->assertStatus(201);
        $response->assertJsonFragment([
            "message" => "Terapia Transfusional cadastrada com sucesso",
        ]);
        $response->assertJsonStructure([
            "terapia_transfusional"
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

        $response = $this->postJson("api/pacientes/{$paciente->id}/terapia-transfusional", $dados);
        $response->assertStatus(422);
        $response->assertJsonFragment($erro);
        // dd($response->baseResponse->getContent(), $erro);
        
    }

    public function cenariosValidacao()
    {
        return [
            [
                ['data_transfusao' => 0],
                ['data_transfusao' => ['O campo data transfusao não é uma data válida.']]
            ],
            [
                ['tipo_transfusao_id' => 0],
                ['tipo_transfusao_id' => ['O campo tipo transfusao id selecionado é inválido.']]
            ],
            [
                ['volume_transfusao' => 'teste'],
                ['volume_transfusao' => ['O campo volume transfusao tem um formato inválido.']]
            ]
        ];
    }
}
