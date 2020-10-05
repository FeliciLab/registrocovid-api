<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplicacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complicacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->references('id')->on('pacientes');
            $table->foreignId('tipo_complicacao_id')->references('id')->on('tipos_complicacoes');
            $table->date('data');
            $table->date('data_termino')->nullable();
            $table->string('descricao', 100)->nullable();
            $table->boolean('menos_24h_uti')->nullable();
            $table->integer('glasgow_admissao_uti')->nullable();
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
        Schema::dropIfExists('complicacoes');
    }
}
