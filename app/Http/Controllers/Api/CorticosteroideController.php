<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Corticosteroide;

class CorticosteroideController extends Controller
{
    /**
     * Listar corticosteroides
     *
     * @OA\Get(
     *      path="/api/corticosteroides",
     *      operationId="getCorticosteroides",
     *      tags={"Recursos"},
     *      summary="Lista corticosteroides",
     *      description="Retorna todos corticosteroides cadastrados no sistema",
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Corticosteroide::all();
    }
}
