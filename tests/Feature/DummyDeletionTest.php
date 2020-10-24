<?php

namespace Tests\Feature;

use App\Models\Comorbidade;
use App\Models\Complicacao;
use App\Models\ComplicacaoVentilacaoMec;
use App\Models\Corticosteroide;
use App\Models\Desfecho;
use App\Models\EvolucaoDiaria;
use App\Models\ExameComplementar;
use App\Models\ExameTesteRapido;
use App\Models\Historico;
use App\Models\InclusaoDesmame;
use App\Models\IRAS;
use App\Models\Paciente;
use App\Models\Pronacao;
use App\Models\RtPcrResultado;
use App\Models\Sintoma;
use App\Models\SuporteRespiratorio;
use App\Models\Telefone;
use App\Models\TratamentoSuporte;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DummyDeletionTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        $this->authenticated();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDeleteDummy()
    {
        $paciente = factory(Paciente::class)->create([
            'coletador_id' => $this->currentUser->id,
        ]);

        factory(Comorbidade::class)->create([
            'paciente_id' => $paciente->id,
        ]);
        factory(Complicacao::class)->create([
            'paciente_id' => $paciente->id,
        ]);
        factory(Desfecho::class)->create([
            'paciente_id' => $paciente->id,
        ]);
        factory(Historico::class)->create([
            'paciente_id' => $paciente->id,
        ]);
        factory(IRAS::class)->create([
            'paciente_id' => $paciente->id,
        ]);
        factory(SuporteRespiratorio::class)->create([
            'paciente_id' => $paciente->id,
        ]);
        factory(TratamentoSuporte::class)->create([
            'paciente_id' => $paciente->id,
        ]);
        factory(EvolucaoDiaria::class)->create([
            'paciente_id' => $paciente->id,
        ]);
        factory(ExameComplementar::class)->create([
            'paciente_id' => $paciente->id,
        ]);

        $responseComorbidade = $this->getJson("api/pacientes/{$paciente->id}/comorbidades");

        $responseComorbidade->assertStatus(200);
        $responseComorbidade->assertJsonStructure([
            'paciente_id',
            'doenca_pulmonar_cronica',
            'doenca_reumatologica',
            'neoplasia',
            'quimioterapia',
            'HIV',
            'transplantado',
            'corticosteroide',
            'doenca_autoimune',
            'doenca_renal_cronica',
            'doenca_hepatica_cronica',
            'doenca_neurologica',
            'tuberculose',
        ]);

        $responseDummy = $this->deleteJson("/api/dummy",['id' => $this->currentUser->id]);
        $responseDummy->assertStatus(200);

        $responseComorbidadeDepois = $this->getJson("api/pacientes/{$paciente->id}/comorbidades");
        $responseComorbidadeDepois->assertJsonFragment([
            "message" => "Campos inválidos."
        ]);

        $responseComplicacaoDepois = $this->getJson("api/pacientes/{$paciente->id}/complicacoes");
        
        $responseComplicacaoDepois->assertJsonFragment([
            "message" => "Campos inválidos."
        ]);

    }
}

// php artisan migrate:fresh --seed --database=pgsql_test
// php artisan test --filter DummyDeletionTest