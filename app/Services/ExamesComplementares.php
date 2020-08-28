<?php

namespace App\Services;

use App\Models\ExameComplementar as ExameComplementarModel;

class ExamesComplementares
{

    public static function salvaExamesComplementares($examesComplementares, $pacienteId){
        $resultadosExames = [];
        foreach ($examesComplementares as $exame) {
            array_push($resultadosExames, self::registra($exame, $pacienteId));
        }
        return $resultadosExames;
    }

    private static function registra($exame, $pacienteId){
        $data = array_merge($exame, ['paciente_id' => $pacienteId]);
        return ExameComplementarModel::create($data);
    }
}