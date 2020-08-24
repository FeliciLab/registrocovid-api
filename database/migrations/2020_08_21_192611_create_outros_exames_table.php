<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutrosExamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outros_exames', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->references('id')->on('pacientes');
            $table->foreignId('tipo_outro_exame_id')->references('id')->on('tipo_outro_exame');
            $table->string('resultado', 100);
            $table->date('data');
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
        Schema::dropIfExists('outros_exames');
    }
}
