<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoSuporteRespiratorio;

class SuporteRespiratorioController extends Controller
{
    public function index()
    {
        return TipoSuporteRespiratorio::all()->toArray();
    }
}
