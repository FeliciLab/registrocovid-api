<?php

namespace Tests\Unit\Paciente;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PacienteStoreTest extends TestCase
{
    use WithoutMiddleware;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::create([
            "name" => "Moises rodrigues",
            "cpf" => "07093988326",
            "email" => "moisesabreurodrigues@gmail.com",
            "password" => "123456789"
        ]);

        auth()->login($user);

        $this->user = $user;
    }

    protected function tearDown(): void
    {
        auth()->logout();

        parent::tearDown();
    }

    public function testCriarPacienteComSucesso()
    {
        $postData = [
            "prontuario" => "5415147",
            "data_internacao"=> "2020-07-22",
            "instituicao_primeiro_atendimento_id"=> "1",
            "instituicao_refererencia_id"=> "2",
            "data_atendimento_referencia"=> "2020-07-21",
            "instituicao_id"=> "2",
            "bairro_id"=> "1",
            "estado_nascimento_id"=> "2",
            "cor_id" => "1",
            "estadocivil_id"=> "1",
            "escolaridade_id"=> "1",
            "atividadeprofissional_id"=> "1",
            "sexo"=> "M",
            "data_nascimento"=> "04/09/1998",
            "qtd_pessoas_domicilio"=> "2",
            "caso_confirmado"=> false,
            "data_inicio_sintomas"=> "2020-07-22"
        ];

        $response = $this->post('api/paciente/paciente', $postData);

        $response->assertStatus(201);

    }
}
