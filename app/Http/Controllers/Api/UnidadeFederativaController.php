<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UnidadeFederativa;
use Illuminate\Http\Request;
use Exception;

class UnidadeFederativaController extends Controller
{
    private $uf;

    public function __construct(UnidadeFederativa $uf)
    {
        $this->uf = $uf;
    }

    public function index()
    {
        try{
            $ufs = $this->uf->all();

            return response()->json([
                "docs" => $ufs->toArray()
            ], 200);
        }
        catch(Exception $e){
            return response()->json([
                'message' => 'Não foi possivel retornar os estados',
            ], $e->getCode());
        }

    }
}
