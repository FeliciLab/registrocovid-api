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
            'caso_confirmado' => true,
            'data_inicio_sintomas' => "2020-06-18",
            'outros_sintomas' => null
        ]);

       $dataPaciente = [ 
        'caso_confirmado' => false,
        'data_inicio_sintomas' => "2020-06-20",
        'outros_sintomas' => ["outroSintoma"]
       ];

        $response = $this->patchJson("api/pacientes/$paciente->id", $dataPaciente);
       
        $response->assertJsonFragment($dataPaciente);

        unset($dataPaciente['outros_sintomas']);
        $this->assertDatabaseHas("pacientes", array_merge($dataPaciente, [
            'id'=> $paciente->id, 
        ]));

        $paciente->refresh();
        $this->assertSame(["outroSintoma"], $paciente->outros_sintomas);
        
    }

  /**
   * @dataProvider possiveisValoresPacientes
  */
  public function testPossiveisValoresCamposPaciente($data, $erro)
  {

    $paciente = factory(Paciente::class)->create([
        'coletador_id' => $this->currentUser->id,
        'caso_confirmado' => true,
        'data_inicio_sintomas' => "2020-06-18",
        'outros_sintomas' => null
    ]);

    $response = $this->patchJson("api/pacientes/{$paciente->id}", $data);
    $response->assertStatus(422);
    $response->assertJsonFragment([
      'message' => 'The given data was invalid.',
      'errors' => $erro
    ]);
  }

  public function possiveisValoresPacientes()
  {
    return [
      // Testa se é um array
      [['data_inicio_sintomas'=> 31], ['data_inicio_sintomas' => ['O campo data inicio sintomas não é uma data válida.']]],
    
      // Testa se não é inteiro
      //[['a'], ['drogas.0' => ['O campo drogas.0 deve ser um número inteiro.']]],     
    ];
  }
}
