<?php

namespace App\Services;

use App\Models\OutrosExames as OutrosExamesModel;

class OutrosExames
{

    public static function salvaOutrosExames($outrosexames, $pacienteId){
        $resultadosExames = [];
        foreach ($outrosexames as $exame) {
            array_push($resultadosExames, self::registra($exame, $pacienteId));
        }
        return $resultadosExames;
    }

    private static function registra($exame, $pacienteId){
        $data = array_merge($exame, ['paciente_id' => $pacienteId]);
        return OutrosExamesModel::create($data);
    }
}