<?php

namespace Tests\Feature\ResultadoPCR;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListaResultadosPCRTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testListaResultadosPCR()
    {
        $response = $this->json('GET', 'api/pcr-resultado');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "id" => 1,
            "descricao" => "Detectável",
        ]);
    }
}
