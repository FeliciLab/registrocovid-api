<?php

namespace App\Http\Controllers\Api;

use App\Api\ErrorMessage;
use App\Models\SituacaoUsoDrogas;
use App\Http\Controllers\Controller;

class SituacaoUsoDrogasController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @OA\Get(
     *      path="/api/situacao-uso-drogas",
     *      operationId="getSituacaoUsoDrogas",
     *      tags={"Recursos"},
     *      summary="Lista situação uso drogas",
     *      description="Retorna todos as situações de uso de drogas cadastrado no sistema",
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
     *                              "descricao": "É usuário" 
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
    public function index()
    {
        try {
            return SituacaoUsoDrogas::all();
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
