<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Api\ErrorMessage;
use App\Models\Escolaridade;

class EscolaridadeController extends Controller
{
     /** * Listar todas as escolaridades    
     * @return JsonResponse  
     */
    public function index()
    {
        try {

          $escolaridades = Escolaridade::all();
        
          return response()->json($escolaridades);

        } catch(\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
