<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoDesfecho;
use Illuminate\Http\Request;

class TipoDesfechoController extends Controller
{
    public function index()
    {
        return TipoDesfecho::all()->toArray();
    }
}
