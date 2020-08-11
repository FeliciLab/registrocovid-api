<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EvolucaoDiaria;
use App\Api\ErrorMessage;

class EvolucaoDiariaController extends Controller
{
    public function index($pacienteId)
    {
        $comorbidade = EvolucaoDiaria::where('paciente_id', $pacienteId)->get();

         return response()->json($comorbidade);
    }
}
