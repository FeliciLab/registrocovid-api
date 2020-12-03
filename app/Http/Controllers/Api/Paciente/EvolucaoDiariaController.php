<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use App\Http\Requests\EvolucaoDiariaRequest;
use App\Models\EvolucaoDiaria;
use App\Api\ErrorMessage;
use App\Models\InclusaoDesmame;
use App\Models\Pronacao;
use App\Models\SuporteRespiratorio;

class EvolucaoDiariaController extends Controller
{
    public function index($pacienteId)
    {
        $evolucoesDiarias = EvolucaoDiaria::where('paciente_id', $pacienteId)->get();

        return response()->json($evolucoesDiarias);
    }

    public function store($pacienteId, EvolucaoDiariaRequest $request)
    {
        $data = array_merge($request->all(), ['paciente_id' => $pacienteId]);
        
        $evolucoesDiarias = EvolucaoDiaria::create($data);

        return response()->json($evolucoesDiarias, 201);
    }

    /**
   * Listar Uma Evolucação Diaria a partir do ID
   *
   * @OA\Get(
   *      path="/pacientes/{pacienteId}/evolucoes-diarias/{evolucaoId}",
   *      operationId="getEvolucaoDiariaEspecifica",
   *      tags={"Paciente"},
   *      summary="Lista evolução diária pelo ID",
   *      description="Retorna uma evolução diária se a evolução com id existir e seja do paciente",
   *      security={{"apiAuth":{}}},
   *      @OA\Parameter(
   *          name="pacienteId",
   *          description="ID do paciente previamente cadastrado",
   *          required=true,
   *          in="path",
   *          @OA\Schema(
   *              type="string"
   *          )
   *      ),
   *      @OA\Parameter(
   *          name="evolucaoId",
   *          description="ID da evolução diaria",
   *          required=true,
   *          in="path",
   *          @OA\Schema(
   *              type="string"
   *          )
   *      ),
   *      @OA\Response(
   *          response=200,
   *          description="Executado com sucesso",
   *          content={
   *              @OA\MediaType(
   *                  mediaType="application/json",
   *                  @OA\Schema(
   *                      example={
   *                          {
   *                            "id": 1,
    *                           "paciente_id": 1,
    *                           "data_evolucao": "2020-08-20",
    *                           "temperatura": null,
    *                           "frequencia_respiratoria": null,
    *                           "peso": null,
    *                           "altura": null,
    *                           "pressao_sistolica": null,
    *                           "pressao_diastolica": null,
    *                           "frequencia_cardiaca": null,
    *                           "ascultura_pulmonar": null,
    *                           "oximetria": null,
    *                           "escala_glasgow": null,
    *                           "created_at": "2020-08-19T18:30:07.000000Z",
    *                           "updated_at": "2020-08-19T18:30:07.000000Z"
    *                         }
   *                      }
   *                  )
   *              )
   *          }
   *       ),
   *      @OA\Response(response=401, description="Unauthorized"),
   *      @OA\Response(response=404, description="Evolução diária não encontrada para este paciente"),
   * )
   *
   * @return \Illuminate\Http\Response
   */

    public function show($pacienteId, $evolucaoId)
    {
        $evolucaoDiaria = EvolucaoDiaria::where('paciente_id', $pacienteId)->where('id', $evolucaoId)->first();
        // return response()->json($evolucaoDiaria->data_evolucao);
        $suportesRespiratorios = SuporteRespiratorio::where('paciente_id', $pacienteId)->where('data_inicio',$evolucaoDiaria->data_evolucao)->get();
        $tratamentoPronacao = Pronacao::where('paciente_id', $pacienteId)->where('data_pronacao',$evolucaoDiaria->data_evolucao)->get();
        $tratamentoInclusaoDesmame = InclusaoDesmame::where('paciente_id', $pacienteId)->where('data_inclusao_desmame',$evolucaoDiaria->data_evolucao)->get();
        

        if (!$evolucaoDiaria) {
            return response()->json('', 404);
        }
        return response()->json([
            'evolucaoDiaria' => $evolucaoDiaria,
            'suportesRespiratorios' => $suportesRespiratorios,
            'tratamento_pronacao' => $tratamentoPronacao,
            'tratamento_inclusao_desmame' => $tratamentoInclusaoDesmame
        ]);
    }
}
