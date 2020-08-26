<?php

namespace App\Http\Controllers\Api\Paciente\ComplicacoesVentilacaoMec;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComplicacaoVentilacaoMecanicaRequest;
use App\Models\ComplicacaoVentilacaoMec;
use App\Models\TransfusaoOcorrencia;

class ComplicacoesVentilacaoMecController extends Controller
{

    /**
     * Exibi complicações relacionadas a ventilação mecânica e transfussões do paciente
     *
     * @OA\Get(
     *      path="/api/pacientes/{pacienteId}/ventilacao-mecanica",
     *      operationId="getComplicacao",
     *      tags={"Paciente"},
     *      summary="Exibi complicações relacionadas a ventilação mecânica e transfussoes do paciente cadastrada",
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
     *                          "complicacoes_ventilacao_mecanica": {
     *                              {
     *                                  "id": 1,
     *                                  "data_complicacao": "2020-08-19",
     *                                  "descricao": "descricao qualquer",
     *                                  "tipo_complicacao": {
     *                                       "id": 4,
     *                                       "descricao": "Necessidade transfusional"
     *                                   }
     *                              }
     *                          },
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
        $complicacaoVentilacaoMec = ComplicacaoVentilacaoMec::where('paciente_id', $pacienteId)->get()->toArray();
        $transfusaoOcorrencia = TransfusaoOcorrencia::where('paciente_id', $pacienteId)->get()->toArray();

        if (!count($complicacaoVentilacaoMec) && !count($transfusaoOcorrencia)) {
            return response()->json(
                [
                    'message' => 'Paciente não possui complicações cadastradas',
                    'complicacoes_ventilacao_mecanica' => [],
                    'transfussoes_ocorrencia' => []
                ],
                200
            );
        }

        return response()->json([
            'complicacoes_ventilacao_mecanica' => $complicacaoVentilacaoMec,
            'transfussoes_ocorrencia' => $transfusaoOcorrencia
        ]);
    }


    /**
     * Cadastra complicaçãoes relacionadas a ventilação mecânica do paciente no sistema
     *
     * @OA\Post(
     *      path="/api/pacientes/{pacienteId}/ventilacao-mecanica",
     *      operationId="storeComplicacaoVentilacaoMecanica",
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
     *          description="Os campos a seguir não são obrigatórios mas se data_complicacao for preenchido obrigatoriamente tipo_complicacao_id é obrigatorio e vice-versa. O mesmo acontece com data_transfusao e tipo_transfusao_id.",
     *          required=false,
     *          @OA\JsonContent(
     *              @OA\Property(property="tipo_complicacao_id", type="integer", example=4),
     *              @OA\Property(property="data_complicacao", type="string", example="2020-08-19"),
     *              @OA\Property(property="descricao", type="string", example="descricao da complicacao"),
     *              @OA\Property(property="tipo_transfusao_id", type="integer", example=1),
     *              @OA\Property(property="data_transfusao", type="string", example="2020-08-20"),
     *              @OA\Property(property="volume_transfusao", type="float", example=4.2)
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
     *                          "message": "Complicação ventilação mecânica cadastrado com sucesso",
     *                          "ventilacao_mecanica": {
     *                              "data_complicacao": "2020-08-19",
     *                              "descricao": "descricao da complicacao",
     *                              "id": 2
     *                          },
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
    public function store(ComplicacaoVentilacaoMecanicaRequest $request, $pacienteId)
    {
        if ($request->has(['tipo_complicacao_id', 'data_complicacao'])) {
            $complicacaoVentilacaoMec = ComplicacaoVentilacaoMec::create(array_merge(
                $request->only(['tipo_complicacao_id', 'data_complicacao', 'descricao']),
                [
                    'paciente_id' => $pacienteId
                ]
            ));

            if ($request->input('tipo_complicacao_id') == 4) {
                $transfusaoOcorrencia = new TransfusaoOcorrencia();
                $transfusaoOcorrencia->data_transfusao = $request->data_complicacao;
                $transfusaoOcorrencia->volume_transfusao = $request->volume_transfusao;
                $transfusaoOcorrencia->paciente_id = $pacienteId;
                $transfusaoOcorrencia->save();
            }
        }

        if ($request->has(['tipo_transfusao_id', 'data_transfusao', 'volume_transfusao'])) {
            $transfusaoOcorrencia = TransfusaoOcorrencia::create(array_merge(
                $request->only(['tipo_transfusao_id', 'data_transfusao', 'volume_transfusao']),
                [
                    'paciente_id' => $pacienteId
                ]
            ));
        }

        return response()->json([
            "message" => "Complicação ventilação mecânica cadastrado com sucesso",
            "ventilacao_mecanica" => isset($complicacaoVentilacaoMec) ? $complicacaoVentilacaoMec->toArray() : [],
            "transfusao_ocorrencia" => isset($transfusaoOcorrencia) ? $transfusaoOcorrencia->toArray() : []
        ], 201);
    }
}
