<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Corticosteroide;
use App\Api\ErrorMessage;
use Illuminate\Http\JsonResponse;

class CorticosteroideController extends Controller
{
    /**
     * Listar corticosteroides
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $corticosteroide = Corticosteroide::all();

            return response()->json($corticosteroide);
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
