<?php

namespace Tests\Feature\Estados;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListaDeEstadosTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testRetornoTodosOsEstados()
    {
        $response = $this->json('GET', 'api/estados');
        $response->assertOk();
        $response->assertJsonCount(27);
        $response->assertJsonFragment([
            "id" => 1,
            "nome" => "Acre",
            "unidade_federativa" => "AC"
        ]);
    }
}
