<?php

namespace Tests\Feature\Paciente\Historico;

use App\Models\Comorbidade;
use App\Models\Paciente;
use Tests\TestCase;

class CriarHistoricoTest extends TestCase
{
  public function setUp(): void
  {
      parent::setUp();
      $this->authenticated();
  }

  public function testPacienteNaoExiste()
  {
    
  }
}