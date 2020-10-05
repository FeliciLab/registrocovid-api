<?php

namespace Tests\Feature\TipoTransfusao;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListaTipoTransfusaoTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testlistaTiposTransfusao()
    {
        $response = $this->json('GET', 'api/tipos-transfusao');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "id" => 1,
            "descricao" => "Sangue total",
        ]);
    }
}
