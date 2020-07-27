<?php

namespace App\Http\Controllers\Api;

use App\Models\SituacaoUsoDrogas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SituacaoUsoDrogasController extends Controller
{

    private $situacao;

    public function __construct(SituacaoUsoDrogas $situacao)
    {
        $this->situacao = $situacao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $situacoes = $this->situacao->all();
        
        return response()->json($situacoes);
    }
}
