<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cor;

class CorController extends Controller
{
    /**
     * Listar todas as cores
     */
    public function index()
    {
        return Cor::all();
    }
}
