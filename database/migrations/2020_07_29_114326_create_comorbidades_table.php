<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComorbidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comorbidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->references('id')->on('pacientes');
            $table->boolean('diabetes')->nullable();
            $table->boolean('obesidade')->nullable();
            $table->boolean('hipertensao')->nullable();
            $table->boolean('doenca_cardiaca')->nullable();
            $table->boolean('doenca_vascular_periferica')->nullable();
            $table->boolean('doenca_pulmonar_cronica')->nullable();
            $table->boolean('doenca_reumatologica')->nullable();
            $table->boolean('neoplasia')->nullable();
            $table->boolean('quimioterapia')->nullable();
            $table->boolean('HIV')->nullable();
            $table->boolean('transplantado')->nullable();
            $table->boolean('corticosteroide')->nullable();
            $table->boolean('doenca_autoimune')->nullable();
            $table->boolean('doenca_renal_cronica')->nullable();
            $table->boolean('doenca_hepatica_cronica')->nullable();
            $table->boolean('doenca_neurologica')->nullable();
            $table->boolean('tuberculose')->nullable();
            $table->boolean('gestacao')->nullable();
            $table->integer('gestacao_semanas')->nullable();
            $table->boolean('puerperio')->nullable();
            $table->integer('puerperio_semanas')->nullable();
            $table->boolean('outras_condicoes')->nullable();
            $table->boolean('medicacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comorbidades');
    }
}
