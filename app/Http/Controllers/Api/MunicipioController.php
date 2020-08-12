<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Municipio;
use App\Repositories\MunicipioRepository;
use Illuminate\Http\Request;
use Exception;

class MunicipioController extends Controller
{
    public function index(Request $request, Municipio $municipio)
    {
        try {
            $repository = new MunicipioRepository($municipio, $request);
            $municipios = $repository->getResult();

            return response()->json($municipios->toArray(), 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Não foi possivel retornar os municipios',
            ], 500);
        }
    }
}
