<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AtividadeProfissional;

class AtividadeProfissionalController extends Controller
{
    /**
     * Listar todas as atividades profissionais
     */
    public function index()
    {
        return AtividadeProfissional::all();
    }
}
