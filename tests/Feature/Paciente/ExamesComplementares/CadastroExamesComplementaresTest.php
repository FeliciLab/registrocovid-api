<?php

namespace Tests\Feature\Paciente\ExamesComplementares;

use App\Models\Paciente;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CadastroExamesComplementaresTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testShouldReturnUnprocessableEntity()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);


        $data  = [
            "examescomplementares" => [
                [
                    "tipo_exames_complementares_id" => 2,
                    "data" => "2020-04-01",
                    "resultado" => "Texto do Resultado"
                ],
                [
                    "tipo_exames_complementares_id" => False,
                    "data" => "2020",
                    "resultado" => 5
                ]
            ]
        ];
        
        $response = $this->postJson("api/pacientes/{$paciente->id}/exames-complementares", $data);
        $response->assertStatus(422);

        $response->assertJsonFragment( ["examescomplementares.1.data" => [
            "O campo examescomplementares.1.data não é uma data válida."
        ]]);
        $response->assertJsonFragment(["examescomplementares.1.resultado" => [
            "O campo examescomplementares.1.resultado deve ser uma string."
        ]]);
        
    }


    public function testShouldReturnCreateSuccessfull()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);


        $data  = [
            "examescomplementares" => [
                [
                    "tipo_exames_complementares_id" => 2,
                    "data" => "2020-04-01",
                    "resultado" => "Texto do Resultado"
                ],
                [
                    "tipo_exames_complementares_id" => 1,
                    "data" => "2019-03-07",
                    "resultado" => 'Texto do Resultado'
                ]
            ]
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/exames-complementares", $data);
        $response->assertStatus(201);
        $response->assertJsonFragment(["message" => "Exames cadastrados com sucesso."]);
        
    }

}
