<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComorbidadesOrgaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comorbidades_orgaos', function (Blueprint $table) {
            $table->foreignId('comorbidade_id')->references('id')->on('comorbidades');
            $table->foreignId('orgao_id')->references('id')->on('orgaos');
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
        Schema::dropIfExists('comorbidades_orgaos');
    }
}
