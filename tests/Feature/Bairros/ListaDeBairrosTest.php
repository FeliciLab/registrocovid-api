<?php

namespace Tests\Feature\Bairros;

use Tests\TestCase;

class ListaDeBairrosTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testRetornoTodosOsBairros()
    {
        $response = $this->json('GET', 'api/bairros');
        $response->assertOk();
        $response->assertJsonCount(999);
        $response->assertJsonFragment([
            "id" => 3,
            "nome" => "Aeroporto Velho",
        ]);
    }

    public function testRetornoBairrosDeMunicipioEspecifico()
    {
        $response = $this->getJson('api/bairros?conditions=municipio_id%3A%3D%3A16');
        $response->assertOk();
        $response->assertJsonCount(47);
    }
}
