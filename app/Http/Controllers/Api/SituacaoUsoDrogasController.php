<?php

namespace App\Http\Controllers\Api;

use App\Api\ErrorMessage;
use App\Models\SituacaoUsoDrogas;
use App\Http\Controllers\Controller;

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
        try {
            $situacoes = $this->situacao->all();

            return response()->json($situacoes);
        } catch (\Exception $e) {
            $message = new ErrorMessage($e->getMessage());
            return response()->json($message->getMessage(), 500);
        }
    }
}
