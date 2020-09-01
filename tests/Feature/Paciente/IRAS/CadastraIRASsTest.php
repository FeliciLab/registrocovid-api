<?php

namespace Tests\Feature\Paciente\IRAS;

use App\Models\Paciente;
use Tests\TestCase;

class CadastraIRASsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testDeveRetornarCamposInvalidos()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);


        $data  = [
                "iras" => [
                [
                    "tipo_iras_id" => 2,
                    "data" => "2020-04-01",
                    "descricao" => "Descrição da infecção"
                ],
                [
                    "tipo_iras_id" => False,
                    "data" => "2020",
                    "descricao" => 5
                ]
            ]
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/iras", $data);
        $response->assertStatus(422);

        $response->assertJsonFragment( ["iras.1.data" => [
            "O campo iras.1.data não é uma data válida."
        ]]);
        $response->assertJsonFragment(["iras.1.descricao" => [
            "O campo iras.1.descricao deve ser uma string."
        ]]);

    }


    public function testCriarIRAS()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);


        $data  = [
            "iras" => [
                [
                    "tipo_iras_id" => 2,
                    "data" => "2020-04-01",
                    "descricao" => ""
                ],
                [
                    "tipo_iras_id" => 1,
                    "data" => "2019-03-07",
                    "descricao" => ''
                ]
            ]
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/iras", $data);
        $response->assertStatus(201);
        $response->assertJsonFragment(["message" => "IRASs cadastradas com sucesso."]);

    }

}