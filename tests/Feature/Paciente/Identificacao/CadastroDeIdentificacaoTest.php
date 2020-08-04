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
                [ 'bairro_id' => 'teste' ],
                [ 'bairro_id' => ['O campo bairro id deve ser um número inteiro.'] ],
            ],
            // Testando se o ID existe na tabela bairros
            [
                [ 'bairro_id' => 0 ],
                [ 'bairro_id' => ['O campo bairro id selecionado é inválido.'] ],
            ],
            // Testando se a data é válida
            [
                [ 'data_internacao' => 'teste' ],
                [ 'data_internacao' => ['O campo data internacao não é uma data válida.'] ],
            ],
            // Testando se o campo sexo é válido
            [
                [ 'sexo' => 0 ],
                [ 'sexo' => ['O campo sexo selecionado é inválido.'] ],
            ],
            [
                [ 'data_nascimento' => 0 ],
                [ 'data_nascimento' => ['O campo data nascimento não é uma data válida.'] ],
            ],
            [
                [ 'estado_nascimento_id' => 'teste' ],
                [ 'estado_nascimento_id' => ['O campo estado nascimento id deve ser um número inteiro.'] ],
            ],
            [
                [ 'estado_nascimento_id' => 0 ],
                [ 'estado_nascimento_id' => ['O campo estado nascimento id selecionado é inválido.'] ],
            ],
            [
                [ 'escolaridade_id' => 'teste' ],
                [ 'escolaridade_id' => ['O campo escolaridade id deve ser um número inteiro.'] ],
            ],
            [
                [ 'escolaridade_id' => 0 ],
                [ 'escolaridade_id' => ['O campo escolaridade id selecionado é inválido.'] ],
            ],
            
            
        ];
    }
}