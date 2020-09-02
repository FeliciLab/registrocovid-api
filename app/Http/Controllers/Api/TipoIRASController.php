<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoIRAS;

class TipoIRASController extends Controller
{

    /**
     * Lista os tipos de Infecções Relacionadas à Assistência à Saúde (IRAS)
     *
     * @OA\Get(
     *      path="/api/tipos-iras",
     *      operationId="getTipoIRAS",
     *      tags={"Recursos"},
     *      summary="Lista os tipos de Infecções Relacionadas à Assistência à Saúde (IRAS)",
     *      description="Retorna todos os tipos de Infecções Relacionadas à Assistência à Saúde (IRAS) cadastradas no sistema",
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
     *                               "id": 1,
     *                               "descricao": "Pneumonia associada à ventilação (PAV)"
     *                           },
     *                           {
     *                               "id": 2,
     *                               "descricao": "Pneumonia associada não à ventilação (PAV)"
     *                           }
     *                          {
     *                               "id": 3,
     *                               "descricao": "Infecção de corrente sanguínea relacionada a catéter"
     *                           },
     *                           {
     *                               "id": 4,
     *                               "descricao": "Infecção de trato urinário associada à sonda vesical"
     *                           }
     *                           {
     *                               "id": 5,
     *                               "descricao": "Outras"
     *                           }
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
        return TipoIRAS::all();
    }
}
