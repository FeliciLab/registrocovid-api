<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoSitio;
use Illuminate\Http\Request;

class TipoSitiosController extends Controller
{
    public function index()
    {
        return TipoSitio::all()->toArray();
    }
}
