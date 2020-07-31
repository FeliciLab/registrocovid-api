<?php

namespace Tests\Feature\Repository;

use App\Models\Paciente;
use Tests\TestCase;

class CondicoesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticated();
    }
}