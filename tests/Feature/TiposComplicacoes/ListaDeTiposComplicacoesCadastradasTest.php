<?php

namespace Tests\Feature\TiposComplicacoes;

use App\Models\TipoComplicacao;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ListaDeTiposComplicacoesCadastradasTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testNenhumTipoComplicacaoCadastrado()
    {
        TipoComplicacao::all()->each(function (TipoComplicacao $tipoComplicacao) {
            $tipoComplicacao->delete();
        });

        $response = $this->json('GET', 'api/tipos-complicacoes');
        $response->assertOk();
        $response->assertJsonCount(0);
    }

    public function testRetornoTiposComplicacoesDoSeed()
    {
        $response = $this->json('GET', 'api/tipos-complicacoes');
        $response->assertOk();
        $response->assertJsonCount(15);
        $response->assertJsonFragment([
            'id' => 2,
            'descricao' => 'Síndrome Respiratória Aguda Grave (SRAG)'
        ]);
    }
}
