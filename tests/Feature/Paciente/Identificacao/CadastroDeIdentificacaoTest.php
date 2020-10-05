<?php

namespace Tests\Feature\Paciente\Identificacao;

use App\Models\Paciente;
use Carbon\Carbon;
use Tests\TestCase;

class CadastroDeIdentificacaoTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testIdentificacaoJaExiste()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id,
            'qtd_pessoas_domicilio' => 1
        ]);

        $response = $this->postJson("api/pacientes/{$paciente->id}/identificacao", []);
        $response->assertStatus(403);
        $response->assertJsonFragment(['message' => 'Identificação do paciente já existe']);
    }

    /**
     * @dataProvider cenariosValidacao
     */
    public function testValidacaoCampos($dados, $erro)
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $response = $this->postJson("api/pacientes/{$paciente->id}/identificacao", $dados);
        $response->assertStatus(422);
        $response->assertJsonFragment($erro);
    }

    public function cenariosValidacao()
    {
        return [
            // Testando se ID é inteiro
            [
                ['bairro_id' => 'teste'],
                ['bairro_id' => ['O campo bairro id deve ser um número inteiro.']],
            ],
            // Testando se o ID existe na tabela bairros
            [
                ['bairro_id' => 0],
                ['bairro_id' => ['O campo bairro id selecionado é inválido.']],
            ],
            // Testando se a data é válida
            [
                ['data_internacao' => 'teste'],
                ['data_internacao' => ['O campo data internacao não é uma data válida.']],
            ],
            // Testando se o campo sexo é válido
            [
                ['sexo' => 0],
                ['sexo' => ['O campo sexo selecionado é inválido.']],
            ],
            [
                ['data_nascimento' => 0],
                ['data_nascimento' => ['O campo data nascimento não é uma data válida.']],
            ],
            [
                ['escolaridade_id' => 'teste'],
                ['escolaridade_id' => ['O campo escolaridade id deve ser um número inteiro.']],
            ],
            [
                ['escolaridade_id' => 0],
                ['escolaridade_id' => ['O campo escolaridade id selecionado é inválido.']],
            ],
            [
                ['atividade_profissional_id' => 0],
                ['atividade_profissional_id' => ['O campo atividade profissional id selecionado é inválido.']],
            ],
            [
                ['atividade_profissional_id' => 'teste'],
                ['atividade_profissional_id' => ['O campo atividade profissional id deve ser um número inteiro.']],
            ],
            [
                ['qtd_pessoas_domicilio' => 'teste'],
                ['qtd_pessoas_domicilio' => ['O campo qtd pessoas domicilio deve ser um número inteiro.']],
            ],
            [
                ['cor_id' => 0],
                ['cor_id' => ['O campo cor id selecionado é inválido.']],
            ],
        ];
    }
}
