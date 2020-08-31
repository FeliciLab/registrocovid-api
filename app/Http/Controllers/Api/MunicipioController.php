<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Municipio;
use App\Repositories\MunicipioRepository;
use Exception;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *      path="/api/municipios",
     *      operationId="getMunicipios",
     *      tags={"Recursos"},
     *      summary="Lista de municípios",
     *      description="Retorna todos municípios cadastrados no sistema",
     *      security={{"apiAuth":{}}},
     *      @OA\Parameter(
     *          name="conditions",
     *          description="Filtros a serem aplicados",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string",
     *              example="estado_id:=:16"
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
     *                              "id": 1347,
     *                              "estado_id": 6,
     *                              "nome": "Fortaleza"
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
    public function index(Municipio $municipio, Request $request)
    {
        try {
            $repository = new MunicipioRepository($municipio, $request);

            return response()->json($repository->getResult());
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Não foi possivel retornar os municipios',
            ], 500);
        }
    }
}
