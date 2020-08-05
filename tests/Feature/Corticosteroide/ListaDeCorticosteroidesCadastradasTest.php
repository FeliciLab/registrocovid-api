<?php

namespace Tests\Feature\Corticosteroides;

use App\Models\Corticosteroide;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ListaDeCorticosteroidesCadastradasTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testNenhumCorticosteroideCadastrada()
    {
        Corticosteroide::all()->each(function (Corticosteroide $corticosteroide) {
            $corticosteroide->delete();
        });

        $response = $this->json('GET', 'api/corticosteroides');
        $response->assertOk();
        $response->assertJsonCount(0);
    }

    public function testRetornoCorticosteroidesDoSeed()
    {
        $response = $this->json('GET', 'api/corticosteroides');
        $response->assertOk();
        $response->assertJsonCount(4);
        $response->assertJsonFragment([
            'id' => 1,
            'descricao' => 'Prednisona > 40 mg/dia'
        ]);
    }
}
