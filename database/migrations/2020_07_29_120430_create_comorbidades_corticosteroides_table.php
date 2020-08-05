<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComorbidadesCorticosteroidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comorbidades_corticosteroides', function (Blueprint $table) {
            $table->foreignId('comorbidade_id')->references('id')->on('comorbidades');
            $table->foreignId('corticosteroide_id')->references('id')->on('corticosteroides');
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
        Schema::dropIfExists('comorbidades_corticosteroides');
    }
}
