<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sintoma;
use App\Api\ErrorMessage;
use Illuminate\Http\JsonResponse;

class SintomaController extends Controller
{
     /**
     * Listar todas os sintomas
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $sintomas = Sintoma::all();

            return response()->json($sintomas);
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
