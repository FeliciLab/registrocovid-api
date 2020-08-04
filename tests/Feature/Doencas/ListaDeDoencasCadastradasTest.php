<?php

namespace Tests\Feature\Doencas;

use App\Models\Doenca;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ListaDeDoencasCadastradasTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testNenhumaDoencaCadastrada()
    {
        Doenca::all()->each(function (Doenca $doenca) {
            $doenca->delete();
        });

        $response = $this->json('GET', 'api/doencas');
        $response->assertOk();
        $response->assertJsonCount(0);
    }

    public function testRetornoDoencasDoSeed()
    {
        $response = $this->json('GET', 'api/doencas');
        $response->assertOk();
        $response->assertJsonCount(7);
        $response->assertJsonFragment([
            'id' => 1,
            'tipo_doenca_id' => 1,
            'descricao' => 'Doença arterial coronariana'
        ]);
    }
}
