<?php

namespace Tests\Feature\Paciente\ExamesLaboratoriais;

use App\Models\Paciente;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CadastroExameLaboratorialTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testValidacaoCamposRtPcr()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $data = [
            "data_coleta" => Carbon::now()->toString(),
            "sitio_tipo_id" => null,
            "data_resultado" => Carbon::now()->toString(),
            "rt_pcr_resultado_id" => 3
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/exames-laboratoriais", $data);
        $response->assertStatus(422);
        $response->assertJsonFragment([
            "O campo sitio tipo id é obrigatório quando data coleta está presente."
        ]);
    }

    public function testValidaCamposExameTesteRapido()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $data = [
            "resultado" => false,
            "data_realizacao" => null
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/exames-laboratoriais", $data);
        $response->assertStatus(422);
        $response->assertJsonFragment([
            "O campo data realizacao é obrigatório quando resultado está presente."
        ]);
    }

    public function testExameLaboratorialComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $data = [
            "data_coleta" => "2020-08-08",
            "sitio_tipo_id" => 2,
            "data_resultado" => null,
            "rt_pcr_resultado_id" => null,
            "resultado" => false,
            "data_realizacao" => "2020-08-15"
        ];

        $response = $this->postJson("api/pacientes/{$paciente->id}/exames-laboratoriais", $data);
        $response->assertStatus(201);
        $response->assertJsonFragment([
            "message" => "Exames laboratóriais específicos cadastrado com sucesso",
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

        $response = $this->postJson("api/pacientes/{$paciente->id}/exames-laboratoriais", $dados);
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
                ['data_coleta' => 'teste'],
                ['data_coleta' => ['O campo data coleta não é uma data válida.']]
            ],
            [
                ['sitio_tipo_id' => 'teste'],
                ['sitio_tipo_id' => ['O campo sitio tipo id deve ser um número inteiro.']]
            ],
            [
                ['sitio_tipo_id' => 0],
                ['sitio_tipo_id' => ['O campo sitio tipo id selecionado é inválido.']]
            ],
            [
                ['data_resultado' => 'teste'],
                ['data_resultado' => ['O campo data resultado não é uma data válida.']]
            ],
            [
                ['rt_pcr_resultado_id' => 'teste'],
                ['rt_pcr_resultado_id' => ['O campo rt pcr resultado id deve ser um número inteiro.']]
            ],
            [
                ['rt_pcr_resultado_id' => 0],
                ['rt_pcr_resultado_id' => ['O campo rt pcr resultado id selecionado é inválido.']]
            ],
            [
                ['resultado' => 'teste'],
                ['resultado' => ['O campo resultado deve ser verdadeiro ou falso.']]
            ],
            [
                ['data_realizacao' => 0],
                ['data_realizacao' => ['O campo data realizacao não é uma data válida.']]
            ],
            [
                ['data_realizacao' => 'teste'],
                ['data_realizacao' => ['O campo data realizacao não é uma data válida.']]
            ],
        ];
    }
}
