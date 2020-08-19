<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AtividadeProfissional;

class AtividadeProfissionalController extends Controller
{
  /**
   * Listar todas as atividades profissionais
   * 
   * @OA\Get(
   *      path="/api/atividades-profissionais",
   *      operationId="getAtividadesProfissionais",
   *      tags={"Recursos"},
   *      summary="Lista atividades profissionais",
   *      description="Retorna todas atividades profissionais cadastrados no sistema",
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
   *                              "nome": "Sem Nenhuma Atividade" 
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
    return AtividadeProfissional::all();
  }
}
