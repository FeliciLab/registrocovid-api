<?php

namespace Tests\Feature\TipoDesfecho;

use Tests\TestCase;

class TipoDesfechoTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testListaTipoDesfecho()
    {
        $response = $this->json('GET', 'api/tipos-desfecho');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "id" => 1,
            "descricao" => "Alta hospitalar",
        ]);
        $response->assertJsonCount(3);
    }
}
