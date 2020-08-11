<?php

namespace App\Http\Controllers\Api\Paciente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EvolucaoDiaria;
use App\Api\ErrorMessage;

class EvolucaoDiariaController extends Controller
{
    /**
     * Listar todas as evoluções diárias
     *
     */
    public function index($pacienteId)
    {
      
        $comorbidade = EvolucaoDiaria::where('paciente_id', $pacienteId)->first();
         //return EvolucaoDiaria::all()->toArray(); //('paciente_id', $pacienteId))

         return response()->json($comorbidade);
        
    }
}
