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
     * Listar todas as drogas
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $drogas = Droga::all();

            return response()->json($drogas);
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }

    /**
     * Criar novo registro de Droga
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
