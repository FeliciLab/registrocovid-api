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
            "data_inicio" => "2020-09-01",
            "data_termino" => "2020-09-02",
            "motivo_hemodialise" => "Motivo de teste hemodialise",
            "frequencia_hemodialise" => "Frequencia de teste hemodialise"
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
                ['data_inicio' => 0],
                ['errors' => ['data_inicio' => ['O campo data inicio não é uma data válida.'], 'data_termino' => ['O campo data termino é obrigatório.']]]
            ],
            [
                ['data_termino' => 0],
                ['errors' => ['data_inicio' => ['O campo data inicio é obrigatório.'], 'data_termino' => ['O campo data termino não é uma data válida.']]]
            ],
            [
                ['motivo_hemodialise' => 0],
                ['errors' => ['data_inicio' => ['O campo data inicio é obrigatório.'], 'data_termino' => ['O campo data termino é obrigatório.'], 'motivo_hemodialise' => ['O campo motivo hemodialise deve ser uma string.']]]
            ],
            [
                ['frequencia_hemodialise' => 0],
                ['errors' => ['data_inicio' => ['O campo data inicio é obrigatório.'], 'data_termino' => ['O campo data termino é obrigatório.'], 'frequencia_hemodialise' => ['O campo frequencia hemodialise deve ser uma string.']]]
            ]
        ];
    }
}
