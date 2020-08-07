<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Paciente;
use App\Models\TipoSitio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoSitiosController extends Controller
{
    public function index()
    {
        return TipoSitio::all()->toArray();
    }
}
