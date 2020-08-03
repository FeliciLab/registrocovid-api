<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comorbidade extends Model
{
    protected $with = [
        'doencas',
        'orgaos'
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
    ];

    public function doencas()
    {
        return $this->belongsToMany(Doenca::class, 'comorbidades_doencas');
    }

    public function orgaos()
    {
        return $this->belongsToMany(Orgao::class, 'comorbidades_orgaos');
    }
}
