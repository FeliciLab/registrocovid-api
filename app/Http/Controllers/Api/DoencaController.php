<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doenca;
use App\Api\ErrorMessage;
use Illuminate\Http\JsonResponse;

class DoencaController extends Controller
{
    /**
     * Listar todas as doencas
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $doencas = Doenca::all();

            return response()->json($doencas);
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
