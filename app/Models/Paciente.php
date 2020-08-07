<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Paciente
 * @package App\Models
 */
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
        'municipio_id',
        'outros_sintomas',
        'data_inicio_sintomas',
        'caso_confirmado'

    ];


    protected $appends = [
        'estado'
    ];

    protected $with = [
        'instituicaoPrimeiroAtendimento',
        'cor',
        'estadoCivil',
        'escolaridade',
        'atividadeProfissional',
        'instituicaoReferencia',
        'municipio',
        'estadoNascimento',
        'tipoSuporteRespiratorios',
        'telefones'
    ];

    protected $hidden = [
        'instituicao_id',
        'instituicao_primeiro_atendimento_id',
        'instituicao_refererencia_id',
        'coletador_id',
        'bairro_id',
        'estado_nascimento_id',
        'cor_id',
        'estadocivil_id',
        'escolaridade_id',
        'atividadeprofissional_id',
        'municipio_id'
    ];

    protected static function booted()
    {
        static::addGlobalScope('coletador_id', function (Builder $query) {
            $query->where('coletador_id', auth()->user()->id);
        });
    }

    public function getEstadoAttribute()
    {
        return $this->municipio->estado ?? null;
    }

    public function associarPacienteTipoSuporteRespiratorio($postData)
    {
        $postData = is_array($postData) ? (object)$postData : $postData;

        if (!isset($postData->tipos_suporte_respiratorio)) {
            return [];
        }

        if (is_array($postData->tipos_suporte_respiratorio)) {
            foreach ($postData->tipos_suporte_respiratorio as $suporte_id) {
                TipoSuporteRespitarioPaciente::firstOrCreate([
                    'tipo_suporte_id' => $suporte_id['id'],
                    'paciente_id' => $this->id
                ]);
            }
        }
    }

    public function associarTelefonesPaciente(array $telefones)
    {
        foreach ($telefones as $telefone) {
            if ($telefone) {
                Telefone::firstOrCreate([
                    'numero' => $telefone,
                    'paciente_id' => $this->id,
                    'tipo' => 1
                ]);
            }
        }
    }

    public function verificaSeExisteIdentificacaoPaciente()
    {
        return $this->qtd_pessoas_domicilio != null;
    }

    public function tipoSuporteRespiratorios()
    {
        return $this->hasManyThrough(
            TipoSuporteRespiratorio::class,
            TipoSuporteRespitarioPaciente::class,
            'paciente_id',
            'id',
            'id',
            'tipo_suporte_id'
        );
    }

    public function historico()
    {
        return $this->hasOne(Historico::class);
    }

    public function instituicaoPrimeiroAtendimento()
    {
        return $this->hasOne(Instituicao::class, 'id', 'instituicao_primeiro_atendimento_id');
    }

    public function cor()
    {
        return $this->hasOne(Cor::class, 'id', 'cor_id');
    }

    public function estadoCivil()
    {
        return $this->hasOne(EstadoCivil::class, 'id', 'estadocivil_id');
    }

    public function escolaridade()
    {
        return $this->hasOne(Escolaridade::class, 'id', 'escolaridade_id');
    }

    public function atividadeProfissional()
    {
        return $this->hasOne(AtividadeProfissional::class, 'id', 'atividadeprofissional_id');
    }

    public function municipio()
    {
        return $this->hasOne(Municipio::class, 'id', 'municipio_id');
    }

    public function instituicaoReferencia()
    {
        return $this->hasOne(Instituicao::class, 'id', 'instituicao_refererencia_id');
    }

    public function estadoNascimento()
    {
        return $this->hasOne(Estado::class, 'id', 'estado_nascimento_id');
    }

    public function telefones()
    {
        return $this->hasMany(Telefone::class);
    }
}
