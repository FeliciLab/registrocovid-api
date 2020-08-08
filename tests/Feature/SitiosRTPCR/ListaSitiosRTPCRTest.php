<?php

namespace Tests\Feature\SitiosRTPCR;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListaSitiosRTPCRTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testlistaSitiosRTPCR()
    {
        $response = $this->json('GET', 'api/sitios-rt-pcr');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "id" => 1,
            "descricao" => "Swab de nasofaringe/orofaringe",
        ]);
    }
}
