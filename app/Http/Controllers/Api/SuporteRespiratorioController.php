<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoSuporteRespiratorio;

class SuporteRespiratorioController extends Controller
{
    private $suportes = null;

    public function __construct(TipoSuporteRespiratorio $suportes)
    {
        $this->suportes = $suportes;
    }

    public function index()
    {
        $tipoSuportesRespiratorios = $this->suportes->all();

        return response()->json([
            "message"   => "Suportes respirátorios retornados com sucesso",
            "suportes"  =>  $tipoSuportesRespiratorios->toArray() 
        ]);
    }

}
