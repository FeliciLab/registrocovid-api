<?php

namespace Tests\Feature\Paciente\TratamentosSuportes;

use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CadastroTratamentoSuporteTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testeTratamentoSuporteComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $data = [
            [
                "data_hemodialise" => "2020-08-26",
                "motivo_hemodialise" => "Motivo de teste hemodialise",
                "frequencia_hemodialise" => "Frequencia de teste hemodialise"
            ],
            [
                "data_hemodialise" => "2020-08-27",
                "motivo_hemodialise" => "Motivo de teste hemodialise 2",
                "frequencia_hemodialise" => "Frequencia de teste hemodialise 2"
            ]
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/tratamentos-suportes", $data);
        $response->assertStatus(201);
        $response->assertJsonFragment([
            "message" => "Tramento de suporte hemodialise cadastrado com sucesso",
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

        $response = $this->postJson("api/pacientes/{$paciente->id}/tratamentos-suportes", $dados);
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
               ['data_hemodialise' => 0],
               ['errors' => ['data_hemodialise.data_hemodialise' => ['O campo data_hemodialise.data_hemodialise é obrigatório.']]]
           ],
           [
               ['motivo_hemodialise' => 0],
               ['errors' => ['motivo_hemodialise.data_hemodialise' => ['O campo motivo_hemodialise.data_hemodialise é obrigatório.']]]
           ],
           [
               ['frequencia_hemodialise' => 0],
               ['errors' => ['frequencia_hemodialise.data_hemodialise' => ['O campo frequencia_hemodialise.data_hemodialise é obrigatório.']]]
           ]
        ];
    }

}
