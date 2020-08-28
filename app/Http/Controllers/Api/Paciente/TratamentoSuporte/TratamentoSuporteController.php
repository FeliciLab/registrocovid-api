<?php

namespace App\Http\Controllers\Api\Paciente\TratamentoSuporte;

use App\Http\Controllers\Controller;
use App\Http\Requests\TratamentoSuporteStoreRequest;
use App\Models\TratamentoSuporte;
use Illuminate\Support\Collection;

class TratamentoSuporteController extends Controller
{

    /**
     * Exibi tratamentos de suportes hemodialise do paciente
     *
     * @OA\Get(
     *      path="/api/pacientes/{pacienteId}/tratamentos-suportes",
     *      operationId="getTratamentosSuportes",
     *      tags={"Paciente"},
     *      summary="Exibi tratamentos de suportes hemodialise do paciente cadastrada",
     *      description="Mostra tratamento suporte cadastrada",
     *      security={{"apiAuth":{}}},
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
     *                          "tratamentos_suportes": {
     *                              {
     *                                  "id": 1,
     *                                  "hemodialise": true,
     *                                  "data_hemodialise": "2020-08-26",
     *                                  "motivo_hemodialise": "Motivo de teste hemodialise",
     *                                  "frequencia_hemodialise": "Frequencia de teste hemodialise",
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
        $tratamentoSuportes = TratamentoSuporte::where('paciente_id', $pacienteId)->get()->toArray();

        if (!count($tratamentoSuportes)) {
            return response()->json([
                "message" => "Paciente não possui tratamentos de suporte hemodiálise",
                "tratamentos_suportes" => $tratamentoSuportes
            ], 200);
        }

        return response()->json([
            "tratamentos_suportes" => $tratamentoSuportes
        ]);
    }

    /**
     * Cadastra tratamento de suporte hemodialise do paciente no sistema
     *
     * @OA\Post(
     *      path="/api/pacientes/{pacienteId}/tratamentos-suportes",
     *      operationId="storeTratamentoSuporte",
     *      tags={"Paciente"},
     *      summary="Cadastro de tratamento suporte",
     *      description="Cadastro tratamento de suporte hemodialise",
     *      security={{"apiAuth":{}}},
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
     *          description="Somente o campo data_hemodialise é obrigatório",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="data_hemodialise", type="date", example="2020-08-26"),
     *              @OA\Property(property="motivo_hemodialise", type="string", example="Motivo de teste hemodialise"),
     *              @OA\Property(property="frequencia_hemodialise", type="string", example="Frequencia de teste hemodialise"),
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
     *                          "message": "Tramento de suporte hemodialise cadastrado com sucesso",
     *                          "tratamentos_suportes": {
     *                              {
     *                                  "data_complicacao": "2020-08-19",
     *                                  "descricao": "descricao da complicacao",
     *                                  "id": 2
     *                              },
     *                           }
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function store(TratamentoSuporteStoreRequest $request, $pacienteId)
    {

        $resultado = new Collection();
        foreach ($request->post() as $tratamento) {
            $resultado->push(
                TratamentoSuporte::create([
                    'paciente_id' => (int) $pacienteId,
                    'data_hemodialise' => $tratamento['data_hemodialise'],
                    'motivo_hemodialise' => $tratamento['motivo_hemodialise'],
                    'frequencia_hemodialise' => $tratamento['frequencia_hemodialise']
                ])
            );
        }

        return response()->json([
            "message" => "Tramento de suporte hemodialise cadastrado com sucesso",
            "tratamentos_suportes" => $resultado
        ], 201);
    }
}
