<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoComplicacaoVM;
use Illuminate\Http\Request;

class TipoComplicacaoVMController extends Controller
{
    public function index()
    {
        return TipoComplicacaoVM::all()->toArray();
    }
}
