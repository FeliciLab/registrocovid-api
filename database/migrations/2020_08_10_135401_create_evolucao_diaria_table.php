<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucaoDiariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucao_diaria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->references('id')->on('pacientes');
            $table->date('data_evolucao');
            $table->float('temperatura' , 4, 2)->nullable();
            $table->integer('frequencia_respiratoria')->nullable();
            $table->float('peso' , 5, 2)->nullable();
            $table->integer('altura')->nullable();
            $table->integer('pressao_sistolica')->nullable();
            $table->integer('pressao_diastolica')->nullable();
            $table->integer('frequencia_cardiaca')->nullable();
            $table->string('ascultura_pulmonar')->nullable();
            $table->float('oximetria', 3, 2)->nullable();
            $table->integer('escala_glasgow')->nullable();
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
        Schema::dropIfExists('evolucao_diaria');
    }
}
