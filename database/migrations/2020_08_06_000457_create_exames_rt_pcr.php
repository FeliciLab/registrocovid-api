<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamesRtPcr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exames_rt_pcr', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->references('id')->on('pacientes');
            $table->date('data_coleta');
            $table->foreignId('sitio_tipo_id')->references('id')->on('sitio_tipo');
            $table->date('data_resultado');
            $table->foreignId('rt_pcr_resultado_id')->references('id')->on('rt_pcr_resultado');
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
        Schema::dropIfExists('exames_rt_pcr');
    }
}
