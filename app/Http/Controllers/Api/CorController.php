<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cor;
use Illuminate\Http\Request;
use App\Api\ErrorMessage;

class CorController extends Controller
{
     /** * Listar todas as drogas    
     * @return JsonResponse  
     */
    public function index()
    {
        try {

          $cores = Cor::all();
        
          return response()->json($cores);

        } catch(\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
