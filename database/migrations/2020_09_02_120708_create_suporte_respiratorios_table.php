<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuporteRespiratoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suportes_respiratorios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->references('id')->on('pacientes');
            $table->foreignId('tipo_suporte_id')->references('id')->on('tipos_suportes_respiratorios');
            $table->float('parametro')->nullable();
            $table->date('data_inicio');
            $table->date('data_termino');
            $table->boolean('menos_24h_vmi')->nullable();
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
        Schema::dropIfExists('suportes_respiratorios');
    }
}
