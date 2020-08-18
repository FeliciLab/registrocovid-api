<?php

namespace Tests\Feature\TipoComplicacaoVM;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TipoComplicacaoVMTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testlistaComplicacaoVM()
    {
        $response = $this->json('GET', 'api/tipos-complicacao-vm');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "id" => 1,
            "descricao" => "Pneumotórax",
        ]);
    }
}
