<?php

namespace App\Services;

use App\Models\OutrosExames as OutrosExamesModel;

class OutrosExames
{

    public static function salvaOutrosExames($outrosexames, $pacienteId){
        $resultadosExames = [];
        foreach ($outrosexames as $exame) {
            $data = array_merge($exame, ['paciente_id' => $pacienteId]);
            array_push($resultadosExames, OutrosExamesModel::create($data));
        }
        return $resultadosExames;
    }
}