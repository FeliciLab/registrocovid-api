<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGasometriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gasometria_arterial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->references('id')->on('pacientes');
            $table->float('ph')->nullable();
            $table->integer('pao2')->nullable();
            $table->integer('paco2')->nullable();
            $table->integer('hco3')->nullable();
            $table->integer('be')->nullable();
            $table->integer('sao2')->nullable();
            $table->integer('lactato')->nullable();
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
        Schema::dropIfExists('gasometria_arterial');
    }
}
