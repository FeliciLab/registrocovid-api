<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComorbidadesOutrasCondicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comorbidades_outras_condicoes', function (Blueprint $table) {
            $table->foreignId('comorbidade_id')->references('id')->on('comorbidades');
            $table->foreignId('outras_condicoes_id')->references('id')->on('outras_condicoes');
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
        Schema::dropIfExists('comorbidades_outras_condicoes');
    }
}
