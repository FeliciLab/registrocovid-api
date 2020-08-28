<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoExameComplementar;

class TipoExamesComplementaresController extends Controller
{

    public function index()
    {
        return TipoExameComplementar::all();
    }
}
