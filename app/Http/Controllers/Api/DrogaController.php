<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Droga;
use App\Http\Requests\DrogaRequest;
use App\Api\ErrorMessage;
use Illuminate\Http\JsonResponse;

class DrogaController extends Controller
{
    /**
     * Lista todas as drogas cadastradas no sistema
     * 
     * @OA\Get(
     *      path="/api/drogas",
     *      operationId="getDrogas",
     *      tags={"Recursos"},
     *      summary="Lista drogas",
     *      description="Retorna todas drogas cadastrados no sistema",
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
     *                              "descricao": "Maconha" 
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
        return Droga::all();
    }

    /**
     * Cadastra droga no sistema
     * 
     * @OA\Post(
     *      path="/api/drogas",
     *      operationId="storeDrogas",
     *      tags={"Recursos"},
     *      summary="Cadastra drogas",
     *      description="Cadastra droga no sistema",
     *      @OA\RequestBody(
     *          description="",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="descricao", type="string")
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
     *                              "descricao": "Maconha" 
     *                          }
     *                      }
     *                  )
     *              )
     *          }
     *       ),
     *      @OA\Response(response=401, description="Unauthorized"),
     * )
     *
     * @param DrogaRequest $request
     * @return JsonResponse
     */
    public function store(DrogaRequest $request): JsonResponse
    {
        try {
            $droga = Droga::create($request->all());

            return response()->json($droga, 201);
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
