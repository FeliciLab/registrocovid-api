<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoSuporteRespiratorio;
use Illuminate\Http\Request;

class SuporteRespiratorioController extends Controller
{
    public function index()
    {
        return TipoSuporteRespiratorio::all()->toArray();
    }
}
