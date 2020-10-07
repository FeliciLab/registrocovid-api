<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesfechosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desfechos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->references('id')->on('pacientes');
            $table->foreignId('tipo_desfecho_id')->references('id')->on('tipo_desfechos');
            $table->foreignId('tipo_autocuidado_id')->nullable()->references('id')->on('tipo_auto_cuidados');
            $table->foreignId('instituicao_transferencia_id')->nullable()->references('id')->on('instituicoes');
            $table->date('data');
            $table->string('causa_obito')->nullable();
            $table->boolean('obito_menos_24h')->nullable();
            $table->boolean('obito_em_vm')->nullable();
            $table->boolean('obito_em_uti')->nullable();
            $table->foreignId('tipo_cuidado_paliativo_id')->nullable()->references('id')->on('tipo_cuidado_paliativos');
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
        Schema::dropIfExists('desfechos');
    }
}
