<?php

namespace App\Services;

use App\Models\IRAS;
use App\Http\Resources\IRASResource;

class IRASService
{
    public static function salvaIRAS($iras, $pacienteId)
    {
        $listaDeIRAS = [];
        foreach ($iras as $exame) {
            array_push($listaDeIRAS, self::registra($exame, $pacienteId));
        }
        return count($listaDeIRAS) ? [
            [
                "message" => "IRASs cadastradas com sucesso.",
                "iras" => $listaDeIRAS
            ], 201]:

            [["message"=> "Não foi possível cadastrar as IRASs."], 200];
    }

    private static function registra($exame, $pacienteId)
    {
        $data = array_merge($exame, ['paciente_id' => $pacienteId]);

        return IRAS::create($data);
    }


    public static function mostrarIRAS($pacienteId)
    {
        $iras = IRASResource::collection(
            IRAS::where('paciente_id', $pacienteId)->get()
        );

        return count($iras) ? [$iras, 200]:
            [
                [
                    "message" => "Paciente não possui IRASs cadastradas.",
                    "iras"  => []
            ], 200];
    }
}
