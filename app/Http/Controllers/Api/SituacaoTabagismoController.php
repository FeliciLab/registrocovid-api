<?php

namespace App\Http\Controllers\api;

use App\Api\ErrorMessage;
use App\Http\Controllers\Controller;
use App\Models\SituacaoTabagismo;
use Illuminate\Http\Request;

class SituacaoTabagismoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *      path="/api/situacao-tabagismo",
     *      operationId="getSituacaoTabagismo",
     *      tags={"Recursos"},
     *      summary="Lista situação tabagismo",
     *      description="Retorna todos as situações de tabagismo cadastrado no sistema",
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
     *                              "descricao": "Fumante"
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
        return SituacaoTabagismo::all();
    }
}
