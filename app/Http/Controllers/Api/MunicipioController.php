<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Exception;

class MunicipioController extends Controller
{
    private $municipio;

    public function __construct(Municipio $municipio)
    {
        $this->municipio = $municipio;
    }

    public function index()
    {
        try{
            $municipio = $this->municipio->all();

            return response()->json($municipio->toArray(), 200);
        }
        catch(Exception $e){
            return response()->json([
                'message' => 'Não foi possivel retornar os municipios',
            ], 500);
        }
    }
}
