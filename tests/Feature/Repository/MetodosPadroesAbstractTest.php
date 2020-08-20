<?php

namespace Tests\Feature\Repository;

use App\Repositories\AbstractRepository;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Models\Paciente;

class MetodosPadroesAbstractTest extends TestCase
{

  /**
   * @dataProvider variacoesNaRequest
  */
    public function testAlteracoesNaQuery($query, $expectedSql)
    {
        $this->authenticated();

        $paciente = new Paciente();
        $request = new Request($query);
        $repository = new class($paciente, $request) extends AbstractRepository {
        };

        $this->assertEquals($expectedSql, $repository->getModel()->toSql());
    }

    public function variacoesNaRequest()
    {
        return [
      // Teste uma condicao
      [
        ['conditions' => 'prontuario:like:5544%'],
        'select * from "pacientes" where "prontuario"::text like ? and "coletador_id" = ? order by "created_at" desc'
      ],

      // Teste duas condicoes
      [
        ['conditions' => 'prontuario:like:5544%;id:=:1'],
        'select * from "pacientes" where "prontuario"::text like ? and "id" = ? and "coletador_id" = ? order by "created_at" desc'
      ],

      // Teste um field
      [
        ['fields' => 'id'],
        'select id from "pacientes" where "coletador_id" = ? order by "created_at" desc'
      ],

      // Teste três fields
      [
        ['fields' => 'id,prontuario,created_at'],
        'select id,prontuario,created_at from "pacientes" where "coletador_id" = ? order by "created_at" desc'
      ],

      // Teste três fields e três condicoes
      [
        [
          'fields' => 'id,prontuario,caso_confirmado',
          'conditions' => 'prontuario:like:5544%;id:=:1;caso_confimado:=:true'
        ],
        'select id,prontuario,caso_confirmado from "pacientes" where "prontuario"::text like ? and "id" = ? and "caso_confimado" = ? and "coletador_id" = ? order by "created_at" desc'
      ],
    ];
    }
}
