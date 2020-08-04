<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Instituicoes;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    private $instituicao = null;

    public function __construct(Instituicoes $instituicao)
    {
        $this->instituicao = $instituicao;
    }

    public function index()
    {
        $instituicoes = $this->instituicao->all();

        return response()->json([
            "message"   => "Instituições retornados com sucesso",
            "instituicoes"  =>  $instituicoes->toArray() 
        ]);
    }
}
