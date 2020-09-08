<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoAutoCuidado;
use Illuminate\Http\Request;

class TipoAutoCuidadoController extends Controller
{
    public function index()
    {
        return TipoAutoCuidado::all()->toArray();
    }
}
