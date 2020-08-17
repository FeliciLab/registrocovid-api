<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoDoenca;

class TipoDoencaController extends Controller
{
    public function index()
    {
        return TipoDoenca::all()->toArray();
    }
}
