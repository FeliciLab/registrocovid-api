<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AtividadeProfissional;
use App\Api\ErrorMessage;

class AtividadeProfissionalController extends Controller
{
   /** * Listar todas as atividades profissionais
     * @return JsonResponse  
     */
    public function index()
    {
        try {

          $atividadesProfissionais = AtividadeProfissional::all();
        
          return response()->json($atividadesProfissionais);

        } catch(\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
