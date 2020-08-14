<?php

namespace App\Services;

use App\Models\Paciente;
use App\Models\Telefone as TelefoneModel;
use Illuminate\Support\Collection;

class Telefone
{
    private function reconhecerTipoDaRequest(string $chaveNaRequest): string
    {
        switch ($chaveNaRequest) {
            case 'telefone_de_casa':
                return TelefoneModel::TIPO_CASA;
            case 'telefone_celular':
                return TelefoneModel::TIPO_CELULAR;
            case 'telefone_do_trabalho':
                return TelefoneModel::TIPO_TRABALHO;
            case 'telefone_de_vizinho':
                return TelefoneModel::TIPO_VIZINHO;
            default:
                return TelefoneModel::TIPO_CASA;
        }
    }

    public function associarTelefones(Paciente $paciente, array $telefones): Collection
    {
        $resultado = new Collection();
        foreach ($telefones as $tipo => $numero) {
            $resultado->push(
                $this->associarTelefone(
                    $paciente,
                    $this->reconhecerTipoDaRequest($tipo),
                    $numero
                )
            );
        }

        return $resultado;
    }

    public function associarTelefone(Paciente $paciente, string $tipo, string $numero): TelefoneModel
    {
        return TelefoneModel::findOrCreate([
            'paciente_id' => $paciente->id,
            'tipo' => $tipo,
            'numero' => $numero
        ]);
    }
}
