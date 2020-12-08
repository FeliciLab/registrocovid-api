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
        'estado_civil_id',
        'escolaridade_id',
        'atividade_profissional_id',
        'qtd_pessoas_domicilio',
        'coletador_id',
        'instituicao_id',
        'municipio_id',
        'estado_id',
        'outros_sintomas',
        'data_inicio_sintomas',
        'caso_confirmado',
        'chegou_traqueostomizado',
    ];

    protected $with = [
        'instituicaoPrimeiroAtendimento',
        'cor',
        'estadoCivil',
        'escolaridade',
        'atividadeProfissional',
        'instituicaoReferencia',
        'bairro',
        'municipio',
        'estado',
        'estadoNascimento',
        'tipoSuporteRespiratorios',
        'telefones',
        'sintomas'
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
        'estado_id',
        'municipio_id'
    ];

    protected $casts = [
        'outros_sintomas' => 'array'
    ];

    protected static function booted()
    {
        static::addGlobalScope('coletador_id', function (Builder $query) {
            $query->where('coletador_id', auth()->user()->id);
        });

        static::deleting(function ($paciente) {
            // Sintoma::where('paciente_id',$paciente->id)->delete();
            $paciente->sintomas()->sync([]);
            
            $historicos = Historico::where('paciente_id', $paciente->id)->get();
            foreach ($historicos as $historico) {
                $historico->delete();
            }

            $gasometriasArteriais = GasometriaArterial::where('paciente_id', $paciente->id)->get();
            foreach ($gasometriasArteriais as $gasometriaArterial) {
                $gasometriaArterial->delete();
            }

            $telefones = Telefone::where('paciente_id', $paciente->id)->get();
            foreach ($telefones as $telefone) {
                $telefone->delete();
            }

            $complicacoesVM = ComplicacaoVentilacaoMec::where('paciente_id', $paciente->id)->get();
            foreach ($complicacoesVM as $complicacao) {
                $complicacao->delete();
            }

            $transfusoes = TransfusaoOcorrencia::where('paciente_id', $paciente->id)->get();
            foreach ($transfusoes as $transfusao) {
                $transfusao->delete();
            }

            $defechos = Desfecho::where('paciente_id', $paciente->id)->get();
            foreach ($defechos as $defecho) {
                $defecho->delete();
            }

            $iras = IRAS::where('paciente_id', $paciente->id)->get();
            foreach ($iras as $ira) {
                $ira->delete();
            }

            $complicacoes = Complicacao::where('paciente_id', $paciente->id)->get();
            foreach ($complicacoes as $complicacao) {
                $complicacao->delete();
            }

            $desmames = InclusaoDesmame::where('paciente_id', $paciente->id)->get();
            foreach ($desmames as $desmame) {
                $desmame->delete();
            }

            $pronacoes = Pronacao::where('paciente_id', $paciente->id)->get();
            foreach ($pronacoes as $pronacao) {
                $pronacao->delete();
            }

            $suportes = SuporteRespiratorio::where('paciente_id', $paciente->id)->get();
            foreach ($suportes as $suporte) {
                $suporte->delete();
            }

            $tratamentos = TratamentoSuporte::where('paciente_id', $paciente->id)->get();
            foreach ($tratamentos as $tratamento) {
                $tratamento->delete();
            }

            $exames = ExameComplementar::where('paciente_id', $paciente->id)->get();
            foreach ($exames as $exame) {
                $exame->delete();
            }

            $evolucoes = EvolucaoDiaria::where('paciente_id', $paciente->id)->get();
            foreach ($evolucoes as $evolucao) {
                $evolucao->delete();
            }

            $rtpcrs = ExameRtPcr::where('paciente_id', $paciente->id)->get();
            foreach ($rtpcrs as $rtpcr) {
                $rtpcr->delete();
            }

            $testRapidos = ExameTesteRapido::where('paciente_id', $paciente->id)->get();
            foreach ($testRapidos as $testRapido) {
                $testRapido->delete();
            }

            $comorbidades = Comorbidade::where('paciente_id', $paciente->id)->get();
            foreach ($comorbidades as $comorbidade) {
                $comorbidade->delete();
            }

            $paciente->tipoSuporteRespiratorios()->sync([]);

            // REPLICAR NAS OUTRAS
        });
    }

    public function associarPacienteTipoSuporteRespiratorio($postData)
    {
        $postData = is_array($postData) ? (object)$postData : $postData;

        if (!isset($postData->tipos_suporte_respiratorio)) {
            return [];
        }

        if (is_array($postData->tipos_suporte_respiratorio)) {
            foreach ($postData->tipos_suporte_respiratorio as $suporte_id) {
                TiposSuportesRespiratoriosPaciente::firstOrCreate([
                    'tipo_suporte_respiratorio_id' => $suporte_id['id'],
                    'paciente_id' => $this->id
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
        return $this->belongsToMany(TipoSuporteRespiratorio::class, 'tipos_suportes_respiratorios_pacientes');
    }

    public function historico()
    {
        return $this->hasOne(Historico::class);
    }

    public function gasometriaArterial()
    {
        return $this->hasOne(GasometriaArterial::class);
    }

    public function comorbidade()
    {
        return $this->hasOne(Comorbidade::class);
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
        return $this->hasOne(EstadoCivil::class, 'id', 'estado_civil_id');
    }

    public function escolaridade()
    {
        return $this->hasOne(Escolaridade::class, 'id', 'escolaridade_id');
    }

    public function atividadeProfissional()
    {
        return $this->hasOne(AtividadeProfissional::class, 'id', 'atividade_profissional_id');
    }

    public function bairro()
    {
        return $this->hasOne(Bairro::class, 'id', 'bairro_id');
    }

    public function municipio()
    {
        return $this->hasOne(Municipio::class, 'id', 'municipio_id');
    }

    public function estado()
    {
        return $this->hasOne(Estado::class, 'id', 'estado_id');
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

    public function sintomas()
    {
        return $this->belongsToMany(Sintoma::class, 'pacientes_sintomas');
    }
}
