<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Orgao;
use App\Api\ErrorMessage;
use Illuminate\Http\JsonResponse;

class OrgaoController extends Controller
{
    /**
     * Listar todas as orgaos
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $orgaos = Orgao::all();

            return response()->json($orgaos);
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
