<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstadoCivil;
use App\Api\ErrorMessage;

class EstadoCivilController extends Controller
{
    /**
     * Listar Estado civil
     * 
     * @OA\Get(
     *      path="/api/estados-civis",
     *      operationId="getEstadoCivil",
     *      tags={"Recursos"},
     *      summary="Lista estado civil",
     *      description="Retorna todos estados civil cadastrados no sistema",
     *      security={{"apiAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Executado com sucesso",
     *          content={
     *              @OA\MediaType(
     *                  mediaType="application/json",
     *                  @OA\Schema(
     *                      example={
     *                          {
     *                              "id": 1,
     *                              "descricao": "Prednisona > 40 mg/dia" 
     *                          }
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized"),
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {

            $estadosCivis = EstadoCivil::all();

            return response()->json($estadosCivis);
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
