<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('prontuario', 100);
            $table->foreignId('instituicao_id')->references('id')->on('instituicoes');
            $table->foreignId('instituicao_primeiro_atendimento_id')->references('id')->on('instituicoes');
            $table->foreignId('instituicao_refererencia_id')->references('id')->on('instituicoes');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('bairro_id')->references('id')->on('bairros');
            $table->foreignId('estado_nascimento_id')->references('id')->on('estados');
            $table->foreignId('cor_id')->references('id')->on('cores');
            $table->foreignId('estadocivil_id')->references('id')->on('estadocivis');
            $table->foreignId('escolaridade_id')->references('id')->on('escolaridades');
            $table->foreignId('atividadeprofissional_id')->references('id')->on('atividadesprofissionais');

            $table->date('data_internacao');
            $table->date('data_atendimento_referencia');
            $table->char('sexo', 1);
            $table->date('data_nascimento');
            $table->integer('qtd_pessoas_domicilio');
            $table->boolean('caso_confirmado');
            $table->date('data_inicio_sintomas');



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
        Schema::dropIfExists('pacientes');
    }
}
