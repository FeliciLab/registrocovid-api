<?php

namespace App\Http\Controllers\Api\Paciente\SuporteRespiratorio;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuporteRespiratorioStoreRequest;
use App\Models\InclusaoDesmame;
use App\Models\Pronacao;
use App\Models\SuporteRespiratorio;
use Illuminate\Support\Collection;

class SuporteRespiratorioController extends Controller
{

    /**
     * Exibi suportes respiratórios do paciente
     *
     * @OA\Get(
     *      path="/api/pacientes/{pacienteId}/suportes-respiratorios",
     *      operationId="getSuportesRespiratoriosPaciente",
     *      tags={"Paciente"},
     *      summary="Exibi suportes respiratorios do paciente cadastrada",
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
     *                          "tratamento_pronacao": {
     *                              {
     *                                  "id": 9,
     *                                  "data_pronacao": "2020-09-05",
     *                                  "quantidade_horas": "12"
     *                              }
     *                          },
     *                          "tratamento_inclusao_desmame": {
     *                              {
     *                                  "id": 2,
     *                                  "data_inclusao_desmame": "2020-09-02"
     *                              }
     *                          },
     *                          "suporte_respiratorio": {
     *                              {
     *                                  "id": 22,
     *                                  "tipo_suporte_id": 1,
     *                                  "parametro": "100",
     *                                  "data_inicio": "2020-09-02",
     *                                  "data_termino": "2020-09-03",
     *                                  "menos_24h_vmi": false
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
        $resultado = new Collection();

        $tratamentoPronacao = Pronacao::where('paciente_id', $pacienteId)->get()->toArray();
        $tratamentoInclusaoDesmame = InclusaoDesmame::where('paciente_id', $pacienteId)->get()->toArray();
        $suporteRespiratorio = SuporteRespiratorio::where('paciente_id', $pacienteId)->get()->toArray();

        if (!count($tratamentoPronacao) && !count($tratamentoInclusaoDesmame) && !count($suporteRespiratorio)) {
            return response()->json(
                [
                    'message' => 'Paciente não possui suportes respiratorios cadastradas',
                    'suportes_respiratorios' => []
                ],
                200
            );
        }

        $resultado->push($tratamentoPronacao, $tratamentoInclusaoDesmame, $suporteRespiratorio);

        return response()->json([
            'tratamento_pronacao' => $tratamentoPronacao,
            'tratamento_inclusao_desmame' => $tratamentoInclusaoDesmame,
            'suporte_respiratorio' => $suporteRespiratorio,
        ]);
    }


    public function store(SuporteRespiratorioStoreRequest $request, $pacienteId)
    {
        $resultado = new Collection();
        foreach ($request->post() as $suporte) {
            if ($suporte['tipo_suporte_id'] === 10) {
                    $pronacao = Pronacao::where('id', $suporte['id'])->first();
                if ($pronacao) {
                    $pronacao->fill($suporte);
                    $resultado->push($pronacao->save());
                } else {
                    $resultado->push(
                        Pronacao::create(array_merge(
                            $suporte,
                            [
                                'paciente_id' => $pacienteId
                            ]
                        ))
                    );
                }
            }

            if ($suporte['tipo_suporte_id'] === 11) {
                $desmame = InclusaoDesmame::where('id', $suporte['id'])->first();
                if ($desmame) {
                    $desmame->fill($suporte);
                    $resultado->push($desmame->save());
                } else {
                    $resultado->push(
                        InclusaoDesmame::create(array_merge(
                            $suporte,
                            [
                                'paciente_id' => $pacienteId
                            ]
                        ))
                    );
                }
            }

            if ($suporte['tipo_suporte_id'] < 10) {
                $suporterespiratorio = SuporteRespiratorio::where('id', $suporte['id'])->first();
                if ($suporterespiratorio) {
                    $suporterespiratorio->fill($suporte);
                    $resultado->push($suporterespiratorio->save());
                } else {
                    $resultado->push(
                        SuporteRespiratorio::create(array_merge(
                            $suporte,
                            [
                                'paciente_id' => $pacienteId
                            ]
                        ))
                    );
                }
            }
        }

        return response()->json([
            "message" => "Suportes Respiratorios cadastrado com sucesso",
            "suporte_respiratorio" => $resultado
        ], 201);
    }
}
