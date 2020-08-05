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
            $table->string('prontuario', 100)->unique();
            $table->foreignId('instituicao_id')->references('id')->on('instituicoes');
            $table->foreignId('instituicao_primeiro_atendimento_id')->nullable()->references('id')->on('instituicoes');
            $table->foreignId('instituicao_refererencia_id')->nullable()->references('id')->on('instituicoes');
            $table->foreignId('coletador_id')->references('id')->on('users');
            $table->foreignId('bairro_id')->nullable()->references('id')->on('bairros');
            $table->foreignId('estado_nascimento_id')->nullable()->references('id')->on('estados');
            $table->foreignId('cor_id')->nullable()->references('id')->on('cores');
            $table->foreignId('estadocivil_id')->nullable()->references('id')->on('estadocivis');
            $table->foreignId('escolaridade_id')->nullable()->references('id')->on('escolaridades');
            $table->foreignId('atividadeprofissional_id')->nullable()->references('id')->on('atividadesprofissionais');

            $table->date('data_internacao');
            $table->date('data_atendimento_referencia')->nullable();
            $table->char('sexo', 1)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->integer('qtd_pessoas_domicilio')->nullable();
            $table->boolean('caso_confirmado')->nullable();
            $table->date('data_inicio_sintomas')->nullable();



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
