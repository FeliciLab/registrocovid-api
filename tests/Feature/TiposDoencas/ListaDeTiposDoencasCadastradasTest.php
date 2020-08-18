<?php

namespace Tests\Feature\TiposDoencas;

use App\Models\TipoDoenca;
use App\Models\Doenca;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ListaDeTiposDoencasCadastradasTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testNenhumTipoDoencaCadastrado()
    {
        Doenca::all()->each(function (Doenca $doenca) {
            $doenca->delete();
        });
        
        TipoDoenca::all()->each(function (TipoDoenca $tipoDoenca) {
            $tipoDoenca->delete();
        });

        $response = $this->json('GET', 'api/tipos-doencas');
        $response->assertOk();
        $response->assertJsonCount(0);
    }

    public function testRetornoTiposDoencasDoSeed()
    {
        $response = $this->json('GET', 'api/tipos-doencas');
        $response->assertOk();
        $response->assertJsonCount(10);
        $response->assertJsonFragment([
            'id' => 1,
            'descricao' => 'Doença cardíaca'
        ]);
    }
}
