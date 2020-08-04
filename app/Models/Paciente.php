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
        'municipio_id'
    ];


    // protected $appends = [
    //     'instituicao_primeiro_atendimento',
    //     'instituicao_refererencia',
    //     'cor',
    //     'estado_civil',
    //     'escolaridade',
    //     'atividade_profissional',
    //     'data_nascimento',
    //     'municipio',
    //     'estado',
    //     'telefones'
    // ];

    protected $with = [
        'instituicao_primeiro_atendimento'
    ];



    public function getEstadoCivilAttribute()
    {
        return $this->estadoCivil()->first()->nome ?? "";
    }

    public function getEscolaridadeAttribute()
    {
        return $this->escolaridade()->first()->nome ?? "";
    }

    public function getAtividadeProfissionalAttribute()
    {
        return $this->atividadeProfissional()->first()->nome ?? "";
    }

    public function getDataNascimentoAttribute()
    {
        return date('d-m-Y', strtotime($this->attributes['data_nascimento'])) ?? "";
    }

    public function getMunicipioAttribute()
    {
        return $this->municipio()->first()->nome ?? "";
    }

    public function getEstadoAttribute()
    {
        $estado = DB::table('pacientes')
            ->join('municipios', 'pacientes.municipio_id', '=', 'municipios.id')
            ->join('estados', 'municipios.estado_id', '=', 'estados.id')
            ->select('estados.nome')
            ->where('pacientes.id', '=', $this->id)
            ->first();

        return $estado->nome;
    }

    public function getTelefonesAttribute()
    {
        return Telefone::where([
            ['paciente_id', '=', $this->id]
        ])->get();
    }

    public function associarPacienteTipoSuporteRespiratorio($postData)
    {
        $postData = is_array($postData) ? (object) $postData : $postData;

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

    public function verificaSeExisteIdentificacaoPaciente()
    {
        try {
            $paciente = Paciente::where([
                ['qtd_pessoas_domicilio', '!=', null],
            ])->exists();

            if($paciente){
                return true;
            }

            return false;

        } catch (Exception $e) {
            return false;
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
        return $this->hasOne(Municipio::class, 'id', 'municipio_id', 'id');
    }

    public function instituicaoReferencia()
    {
        return $this->hasOne(Instituicao::class, 'id', 'instituicao_refererencia_id');
    }
}
