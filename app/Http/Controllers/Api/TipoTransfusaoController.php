<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoTransfusao;
use Illuminate\Http\Request;

class TipoTransfusaoController extends Controller
{
    public function index()
    {
        return TipoTransfusao::all()->toArray();
    }
}
