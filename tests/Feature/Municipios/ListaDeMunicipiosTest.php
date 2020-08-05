<?php

namespace Tests\Feature\Municipios;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListaDeMunicipiosTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testRetornoTodosOsMunicipios()
    {
        $response = $this->json('GET', 'api/municipios');
        $response->assertOk();
        $response->assertJsonCount(1000);
        $response->assertJsonFragment([
            "id" => 1,
            "nome" => "Acrelândia",
        ]);
    }
}
