<?php

namespace Tests\Feature\Paciente\IRAS;

use Tests\TestCase;

class ListaTiposDeIRASTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->authenticated();
    }


    public function testListaTiposDeIRAS()
    {
        $response = $this->getJson("api/tipos-iras");
        $response->assertOk();

        $response->assertJsonFragment([
            'id' => 1,
            'descricao' => 'Pneumonia associada à ventilação mecânica (PAV)'
        ]);
        $response->assertJsonFragment([   
            'id' => 2,
            'descricao' => 'Pneumonia não associada à ventilação mecânica'
        ]);
        $response->assertJsonFragment([
            'id' => 3,
            'descricao' => 'Infecção de corrente sanguínea relacionada a cateter central (ICSRC)'
        ]);
        $response->assertJsonFragment([   
            'id' => 4,
            'descricao' => 'Infecção de trato urinário associada à sonda vesical (ITUSV)'
        ]);
        $response->assertJsonFragment([   
            'id' => 5,
            'descricao' => 'Outras'
        ]);
    }
}
