<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposSuporterespiratorioPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_suporterespiratorio_paciente', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_suporte_id')->references('id')->on('tipos_suporterespiratorio');
            $table->foreignId('paciente_id')->references('id')->on('pacientes');
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
        Schema::dropIfExists('tipo_suporterespiratorio_paciente');
    }
}
