<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstadoCivil;
use App\Api\ErrorMessage;

class EstadoCivilController extends Controller
{
    /** * Listar todos os estados civis
    * @return JsonResponse
    */
    public function index()
    {
        try {
            $estadosCivis = EstadoCivil::all();
        
            return response()->json($estadosCivis);
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
