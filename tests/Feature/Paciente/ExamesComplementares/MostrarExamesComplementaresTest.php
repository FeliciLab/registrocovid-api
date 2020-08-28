<?php

namespace Tests\Feature\Paciente\ExamesComplementares;

use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MostrarExamesComplementaresTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->authenticated();
    }

    public function testDeveRetornarListaVazia()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id
        ]);

        $response = $this->get("api/pacientes/{$paciente->id}/exames-complementares");
        $response->assertStatus(404);
        $response->assertEmpty();
    }
}
