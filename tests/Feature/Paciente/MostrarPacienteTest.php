<?php

namespace Tests\Feature\Paciente;

use App\Models\Paciente;
use Tests\TestCase;

class MostrarPacienteTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->authenticated();
    }


    public function testMostrarPacienteComSintomas()
    {
        $paciente = factory(Paciente::class)->create([
          'coletador_id' => $this->currentUser->id,
      ]);

        $paciente->sintomas()->sync([1, 2]);

        $response = $this->getJson("api/pacientes");
        $response->assertOk();

        $response->assertJsonFragment([
        'id' => 1,
        'nome' => 'Coriza'
      ]);
      
        $response->assertJsonFragment([
        'id' => 2,
        'nome' => 'Congestão Nasal'
      ]);
    }
}
