<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComorbidadesMedicacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comorbidades_medicacoes', function (Blueprint $table) {
            $table->foreignId('comorbidade_id')->references('id')->on('comorbidades');
            $table->foreignId('medicacao_id')->references('id')->on('medicacoes');
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
        Schema::dropIfExists('comorbidades_medicacoes');
    }
}
