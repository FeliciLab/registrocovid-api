<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Instituicao;

class InstituicaoController extends Controller
{
    public function index()
    {
        return Instituicao::all()->toArray();
    }
}
