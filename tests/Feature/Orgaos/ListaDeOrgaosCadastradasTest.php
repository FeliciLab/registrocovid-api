<?php

namespace Tests\Feature\Orgaos;

use App\Models\Orgao;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ListaDeOrgaosCadastradasTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testNenhumOrgaoCadastrada()
    {
        Orgao::all()->each(function (Orgao $orgao) {
            $orgao->delete();
        });

        $response = $this->json('GET', 'api/orgaos');
        $response->assertOk();
        $response->assertJsonCount(0);
    }

    public function testRetornoOrgaosDoSeed()
    {
        $response = $this->json('GET', 'api/orgaos');
        $response->assertOk();
        $response->assertJsonCount(6);
        $response->assertJsonFragment([
            'id' => 1,
            'descricao' => 'Coração'
        ]);
    }
}
