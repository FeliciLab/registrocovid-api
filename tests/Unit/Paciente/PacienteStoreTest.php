<?php

namespace Tests\Unit\Paciente;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;

class PacienteStoreTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;
    use DatabaseMigrations;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        Artisan::call('db:seed --env=testing');

        $user = User::create([
            "name" => "Nome coletador",
            "cpf" => "987654321",
            "email" => "coletador.email@mail.com",
            "password" => "123456789",
            "instituicao_id" => "1"
        ]);

        auth()->login($user);

        $this->user = $user;
    }

    public function testCriarPacienteComSucesso()
    {
        $postData = $this->form();

        $response = $this->post('api/paciente/paciente', $postData);

        $response->assertStatus(201);

    }

    public function testCriarPacienteComProntuarioDuplicado()
    {
        $postData = ["prontuario" => "5415215"];

        $response = $this->post('api/paciente/paciente', $postData);

        $response->assertStatus(400);
    }

    private function form()
    {
        return [
            "prontuario" => "123456",
            "data_internacao" => "2020-07-22",
            "instituicao_primeiro_atendimento_id" => "1",
            "instituicao_refererencia_id" => "2",
            "data_atendimento_referencia" => "2020-07-21",
            "suporte_respiratorio" => true,
            "reinternacao" => false,
            "tipos_suporte_respiratorio" => [
                [
                    "id" => 1
                ],
                [
                    "id" => 2
                ],
                [
                    "id" => 3
                ]
            ]
        ];
    }
}
