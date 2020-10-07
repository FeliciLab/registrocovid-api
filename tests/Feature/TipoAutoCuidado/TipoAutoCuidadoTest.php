<?php

namespace Tests\Feature\TipoAutoCuidado;

use Tests\TestCase;

class TipoAutoCuidadoTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testListaTipoAutoCuidado()
    {
        $response = $this->json('GET', 'api/tipos-auto-cuidado');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "id" => 1,
            "descricao" => "Mesma antes da doença",
        ]);
        $response->assertJsonCount(3);
    }
}
