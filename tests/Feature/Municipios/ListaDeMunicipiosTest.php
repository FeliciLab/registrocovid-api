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

    public function testRetornoMunicipiosEstadoEspecifico()
    {
        $response = $this->getJson('api/municipios?conditions=estado_id%3A%3D%3A4');
        $response->assertOk();
        $response->assertJsonCount(15);
    }
}
