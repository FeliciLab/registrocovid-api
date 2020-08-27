<?php

namespace Tests\Feature\Paciente\OutrosExames;

use App\Models\OutrosExames;
use Tests\TestCase;

class MostrarTipoOutrosExamesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->authenticated();
    }


    public function testMostrarTipoOutrosExames()
    {
        $response = $this->getJson("api/tipo-exames-complementares");
        $response->assertOk();

        $response->assertJsonFragment([
            "tipo_outro_exame" => [
                [   
                    'id' => 1,
                    'descricao' => 'Coriza'
                ],
                [   
                    'id' => 2,
                    'descricao' => 'Coriza'
                ]
            ] 
        ]);
    }
}
