<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TerapiaTranfusionalRequest;
use App\Models\TerapiaTransfusional;
use App\Models\TransfusaoOcorrencia;
use Illuminate\Http\Request;

class TerapiaTransfusionalController extends Controller
{
    /**
     * Exibi terapias transfusionais do paciente
     *
     * @OA\Get(
     *      path="/api/pacientes/{pacienteId}/terapia-transfusional",
     *      operationId="getTerapiasTransfusionais",
     *      tags={"Paciente"},
     *      summary="Exibi terapias transfusionais do paciente cadastrada",
     *      description="Mostra identificação do paciente cadastrada",
     *      @OA\Parameter(
     *          name="id",
     *          description="ID do paciente previamente cadastrado",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
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
     *                          "transfussoes_ocorrencia": {
     *                              {
     *                                  "id": 1,
     *                                  "data_transfusao": "2020-08-19",
     *                                  "volume_transfusao": "4.2",
     *                                  "tipos_transfussoes": null
     *                              }
     *                          }
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized"),
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pacienteId)
    {
        $terapiaTransfusional = TerapiaTransfusional::where('paciente_id', $pacienteId)->get()->toArray();

        if (!count($terapiaTransfusional)) {
            return response()->json(
                [
                    'message' => 'Paciente não possui Terapias Transfusionais cadastradas',
                    'terapia_transfusional' => []
                ],
                200
            );
        }

        return response()->json([
            'transfussoes_ocorrencia' => $terapiaTransfusional
        ]);
    }


    /**
     * Cadastra terapias transfusionais do paciente no sistema
     *
     * @OA\Post(
     *      path="/api/pacientes/{pacienteId}/terapia-transfusional",
     *      operationId="storeTerapiaTransfusional",
     *      tags={"Paciente"},
     *      summary="Cadastra de identificação do paciente",
     *      description="Cadastra de identificação do paciente",
     *      @OA\Parameter(
     *          name="id",
     *          description="ID do paciente previamente cadastrado",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Exemplo de JSON a ser enviado",
     *          required=true,
     *          @OA\JsonContent(
     *              required={"tipo_transfusao_id", "data_transfusao"},
     *              @OA\Property(property="tipo_transfusao_id", type="integer", example=1),
     *              @OA\Property(property="data_transfusao", type="string", example="2020-08-20"),
     *              @OA\Property(property="volume_transfusao", type="float", example=4.2),
     *              
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
     *                          "message": "Terapia Transfusional cadastrado com sucesso",
     *                          "transfusao_ocorrencia": {
     *                              "data_transfusao": "2020-08-25",
     *                              "volume_transfusao": 4.2,
     *                              "id": 3
     *                          }
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function store(TerapiaTranfusionalRequest $request, $pacienteId)
    {
        $transfusaoOcorrencia = TerapiaTransfusional::create(array_merge(
            $request->post(),
            [
                'paciente_id' => $pacienteId
            ]
        ));

        return response()->json([
            "message" => "Complicação ventilação mecânica cadastrado com sucesso",
            "terapia_transfusional" => $transfusaoOcorrencia->toArray()
        ], 201);
    }
}
