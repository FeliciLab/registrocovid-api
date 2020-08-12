<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bairro;
use App\Repositories\BairroRepository;
use Illuminate\Http\Request;
use Exception;

class BairroController extends Controller
{
    public function index(Request $request, Bairro $bairro)
    {
        try {
            $repository = new BairroRepository($bairro, $request);
            $bairros = $repository->getResult();

            return response()->json($bairros->toArray(), 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Não foi possivel retornar os bairros',
            ], 500);
        }
    }
}
