<?php

namespace App\Services;

use App\Models\IRAS;
use App\Http\Resources\IRASResource;
use Symfony\Component\HttpFoundation\Response;

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
            ], Response::HTTP_CREATED]:

            [["message"=> "Não foi possível cadastrar as IRASs."], Response::HTTP_OK ];
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

        return count($iras) ? [
                ["iras"  => $iras], Response::HTTP_OK
            ]:
            [
                [
                    "message" => "Paciente não possui IRASs cadastradas.",
                    "iras"  => []
            ], Response::HTTP_OK ];
    }
}
