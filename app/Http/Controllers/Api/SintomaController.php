<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sintoma;
use App\Api\ErrorMessage;
use Illuminate\Http\JsonResponse;

class SintomaController extends Controller
{
    /**
     * List sintomas
     * 
     * @OA\Get(
     *      path="/api/sintomas",
     *      operationId="getSintomas",
     *      tags={"Recursos"},
     *      summary="Lista orgãos",
     *      description="Retorna todos sintomas cadastrados no sistema",
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
     *                              "nome": "Coriza"
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
    public function index(): JsonResponse
    {
        try {
            $sintomas = Sintoma::all();

            return response()->json($sintomas);
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
