<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoCuidadoPaliativo;
use Illuminate\Http\Request;

class TipoCuidadoPaliativoController extends Controller
{

    /**
     * Lista tipos de cuidados paliativos
     *
     * @OA\Get(
     *      path="/api/tipos-cuidado-paliativo",
     *      operationId="getTipoCuidadoPaliativo",
     *      tags={"Recursos"},
     *      summary="Lista tipos de cuidados paliativos",
     *      description="Retorna todos tipos de cuidados paliativos cadastrados no sistema",
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
     *                              "descricao": "Sim"
     *                          },
     *                          {
     *                               "id": 2,
     *                               "descricao": "Não"
     *                          },
     *                          {
     *                               "id": 3,
     *                               "descricao": "Aguardando aval equipe CP"
     *                          },
     *                          {
     *                               "id": 4,
     *                               "descricao": "Não RCP por gravidade do caso"
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
        return TipoCuidadoPaliativo::all()->toArray();
    }
}
