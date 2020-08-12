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
        $data = http_build_query(['conditions' => 'municipio_id:=:16']);
        $response = $this->getJson("api/bairros?{$data}");
        $response->assertOk();
        $response->assertJsonCount(47);
    }
}
