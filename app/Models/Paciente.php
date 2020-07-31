<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use App\Models\Telefone;
use Illuminate\Support\Facades\DB;

class Paciente extends Model
{

    protected $fillable = [
        'prontuario',
        'data_internacao',
        'instituicao_primeiro_atendimento_id',
        'instituicao_refererencia_id',
        'data_atendimento_referencia',
        'suporte_respiratorio',
        'reinternacao',

        'bairro_id',
        'sexo',
        'data_nascimento',
        'estado_nascimento_id',
        'cor_id',
        'estadocivil_id',
        'escolaridade_id',
        'atividadeprofissional_id',
        'qtd_pessoas_domicilio',

        'coletador_id',
        'instituicao_id',
    ];

    protected $casts = [
        'suporte_respiratorio' => 'boolean',
        'reinternacao' => 'boolean',
    ];

    protected $hidden = ['created_at', 'updated_at'];


    public function associarPacienteTipoSuporteRespiratorio($postData)
    {
        $postData = is_array($postData) ? (object) $postData : $postData;

        if (!isset($postData->tipos_suporte_respiratorio)) {
            return [];
        }

        if (is_array($postData->tipos_suporte_respiratorio)) {
            foreach ($postData->tipos_suporte_respiratorio as $suporte_id) {
                TipoSuporteRespitarioPaciente::firstOrCreate([
                    'tipo_suporte_id' => $suporte_id['id']
                ]);
            }
        }
    }

    public function associarTelefonesPaciente($postData)
    {
        
        $postData = is_array($postData) ? (object) $postData : $postData;

        $telefones = [];

        if(!is_null($postData->telefone_casa)){
            array_push($telefones, $postData->telefone_casa);
        }

        if(!is_null($postData->telefone_celular)){
            array_push($telefones, $postData->telefone_celular);
        }

        if(!is_null($postData->telefone_trabalho)){
            array_push($telefones, $postData->telefone_trabalho);
        }

        if(!is_null($postData->telefone_vizinho)){
            array_push($telefones, $postData->telefone_vizinho);
        }

        foreach ($telefones as $telefone) {
            Telefone::firstOrCreate([
                'numero' => $telefone,
                'paciente_id' => $this->id,
                'tipo' => 1    
            ]);
        }

    }


    public function tiposuporterespiratorio()
    {
        return $this->hasMany(TipoSuporteRespitarioPaciente::class);
    }
    
    public function historico()
    {
        return $this->hasOne(Historico::class);
    }
}
