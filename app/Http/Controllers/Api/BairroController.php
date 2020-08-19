<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bairro;
use App\Repositories\BairroRepository;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;

class BairroController extends Controller
{
    /**
     * Listar todas as atividades profissionais
     * 
     * @OA\Get(
     *      path="/api/bairros",
     *      operationId="getBairros",
     *      tags={"Recursos"},
     *      summary="Lista bairros",
     *      description="Retorna todos bairros cadastrados no sistema, com a possibilidade de utilização de filtros",
     *      security={{"apiAuth":{}}},
     *      @OA\Parameter(
     *          name="conditions",
     *          description="Filtros a serem aplicados",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string",
     *              example="municipio_id:=:16"
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
     *                          {
     *                              "id": 1,
     *                              "municipio_id": 16,
     *                              "nome": "Abrahão Alab",
     *                              "created_at": null,
     *                              "updated_at": null
     *                          }
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized"),
     * )
     *
     * @return JsonResponse
     */
    public function index(Request $request, Bairro $bairro): JsonResponse
    {
        try {
            $repository = new BairroRepository($bairro, $request);
            $bairros = $repository->getResult();

            return response()->json($bairros->toArray(), 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Não foi possivel retornar os bairros',
            ], 500);
        }
    }
}
