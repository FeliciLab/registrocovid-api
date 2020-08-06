<?php

namespace Tests\Feature\Paciente;

use App\Models\Paciente;
use Carbon\Carbon;
use Tests\TestCase;

class AtualizacaoDePacienteTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }


    public function testAtualizarPacienteComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id,
            'caso_confirmado' => true
        ]);
       // dd($paciente);
        $response = $this->putJson("api/pacientes/$paciente->id", [
            'caso_confirmado' => false,
        ]);
       
        $response->assertOk();
        
        $response->assertJsonStructure([
        'caso_confirmado'
        ]);
    
    }
}
