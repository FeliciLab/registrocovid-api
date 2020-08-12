<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Escolaridade;

class EscolaridadeController extends Controller
{
    /**
     * Listar todas as escolaridades
     */
    public function index()
    {
        return Escolaridade::all();
    }
}
