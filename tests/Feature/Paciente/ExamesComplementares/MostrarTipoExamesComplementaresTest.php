<?php

namespace Tests\Feature\Paciente\ExamesComplementares;

use Tests\TestCase;

class MostrarTipoExamesComplementaresTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->authenticated();
    }


    public function testMostrarTipoExamesComplementares()
    {
        $response = $this->getJson("api/tipos-exames-complementares");
        $response->assertOk();

        $response->assertJsonFragment([
            'id' => 1,
            'descricao' => 'Tomografia computadorizada de tórax'
        ]);
        $response->assertJsonFragment([   
            'id' => 2,
            'descricao' => 'Eletrocardiograma'
        ]);
    }
}
