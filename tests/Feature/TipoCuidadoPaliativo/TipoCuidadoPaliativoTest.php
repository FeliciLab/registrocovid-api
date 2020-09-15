<?php

namespace Tests\Feature\TipoCuidadoPaliativo;

use Tests\TestCase;

class TipoCuidadoPaliativoTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testListaTipoCuidadoPaliativo()
    {
        $response = $this->json('GET', 'api/tipos-cuidado-paliativo');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "id" => 1,
            "descricao" => "Sim",
        ]);
        $response->assertJsonCount(4);
    }
}
