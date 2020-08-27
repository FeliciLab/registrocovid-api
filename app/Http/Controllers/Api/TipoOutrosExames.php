<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoOutroExame;

class TipoOutrosExames extends Controller
{

    public function index()
    {
        return TipoOutroExame::all();
    }
}
