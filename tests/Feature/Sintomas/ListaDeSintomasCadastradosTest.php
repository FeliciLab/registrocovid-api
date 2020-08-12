<?php

namespace Tests\Feature\Sintomas;

use App\Models\Sintoma;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ListaDeSintomasCadastradosTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }

    public function testNenhumSintomaCadastrado()
    {
        Sintoma::all()->each(function (Sintoma $sintoma) {
            $sintoma->delete();
        });

        $response = $this->json('GET', 'api/sintomas');
        $response->assertOk();
        $response->assertJsonCount(0);
    }

    public function testRetornoSintomasDoSeed()
    {
        $response = $this->json('GET', 'api/sintomas');
        $response->assertOk();
        $response->assertJsonCount(18);
        $response->assertJsonFragment([
            'id' => 1,
            'nome' => 'Coriza'
        ]);
    }
}
