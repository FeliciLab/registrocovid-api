<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comorbidade extends Model
{
    protected $with = [
        'doencas',
        'orgaos',
        'corticosteroides'
    ];

    protected $fillable = [
        'paciente_id',
        'diabetes',
        'obesidade',
        'hipertensao',
        'doenca_cardiaca',
        'doenca_vascular_periferica',
        'doenca_pulmonar_cronica',
        'doenca_reumatologica',
        'neoplasia',
        'quimioterapia',
        'HIV',
        'transplantado',
        'corticosteroide',
        'doenca_autoimune',
        'doenca_renal_cronica',
        'doenca_hepatica_cronica',
        'doenca_neurologica',
        'tuberculose',
        'gestacao',
        'gestacao_semanas',
        'puerperio',
        'puerperio_semanas',
        'outras_condicoes',
        'medicacoes',
        'metastatica'
    ];

    protected $casts = [
        'outras_condicoes' => 'array',
        'medicacoes' => 'array',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function doencas()
    {
        return $this->belongsToMany(Doenca::class, 'comorbidades_doencas');
    }

    public function orgaos()
    {
        return $this->belongsToMany(Orgao::class, 'comorbidades_orgaos');
    }

    public function corticosteroides()
    {
        return $this->belongsToMany(Corticosteroide::class, 'comorbidades_corticosteroides');
    }

    protected static function booted()
    {
        static::deleting(function ($comorbidade) {
            $comorbidade->doencas()->sync([]);
            $comorbidade->orgaos()->sync([]);
            $comorbidade->corticosteroides()->sync([]);
            $comorbidade->paciente()->dissociate();
        });
    }
}
