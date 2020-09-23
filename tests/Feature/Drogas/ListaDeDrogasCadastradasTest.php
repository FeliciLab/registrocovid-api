<?php

namespace Tests\Feature\Drogas;

use App\Models\Droga;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ListaDeDrogasCadastradasTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testNenhumaDrogaCadastrada()
    {
        Droga::all()->each(function (Droga $droga) {
            $droga->delete();
        });

        $response = $this->json('GET', 'api/drogas');
        $response->assertOk();
        $response->assertJsonCount(0);
    }

    public function testRetornoDrogasDoSeed()
    {
        $response = $this->json('GET', 'api/drogas');
        $response->assertOk();
        $response->assertJsonCount(5);
        $response->assertJsonFragment([
            'id' => 1,
            'descricao' => 'Maconha'
        ]);
    }
}
