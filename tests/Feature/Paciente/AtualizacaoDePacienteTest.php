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

    public function testAtualizarSintomasDoPacienteComSucesso()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id,
        ]);

        $paciente->sintomas()->sync([1, 2]);

        $response = $this->patchJson("api/pacientes/$paciente->id", []);
       
        $response->assertJsonFragment([
          'id' => 1,
          'nome' => 'Coriza'
        ]);

        $response->assertJsonFragment([
          'id' => 2,
          'nome' => 'Congestão Nasal'
        ]);
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
      // Testa se data é string
      [['data_inicio_sintomas'=> 31], ['data_inicio_sintomas' => ['O campo data inicio sintomas não é uma data válida.']]],
    
      // Testa se caso confirmado é booleano
      [['caso_confirmado'=> 'teste'], ['caso_confirmado' => ['O campo caso confirmado deve ser verdadeiro ou falso.']]],

      // Testa se outros sintomas é array
      [['outros_sintomas'=> 1], ['outros_sintomas' => ['O campo outros sintomas deve ser uma matriz.']]],

      // Testa se outros sintomas é array de string
      [['outros_sintomas'=> [1]], ['outros_sintomas.0' => ['O campo outros_sintomas.0 deve ser uma string.']]],

      // Testa se sintomas é array
      [['sintomas'=> 1], ['sintomas' => ['O campo sintomas deve ser uma matriz.']]],

      // Testa se sintomas é array de int
      [['sintomas'=> ['teste']], ['sintomas.0' => ['O campo sintomas.0 deve ser um número inteiro.']]],
    ];
    }
}
