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
        $response = $this->getJson("api/tipos-exames-complementares");
        $response->assertOk();

        $response->assertJsonFragment([
                [   
                    'id' => 1,
                    'descricao' => 'Tomografia computadorizada de tórax'
                ],
                [   
                    'id' => 2,
                    'descricao' => 'Eletrocardiograma'
                ]
            ] 
        );
    }
}
