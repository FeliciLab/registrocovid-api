<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateComplicacoesAddColumnDebitoUrinario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complicacoes', function (Blueprint $table) {
            $table->integer('debito_urinario')->nullable();
            $table->float('ph')->nullable();
            $table->integer('pao2')->nullable();
            $table->integer('paco2')->nullable();
            $table->integer('hco3')->nullable();
            $table->integer('be')->nullable();
            $table->integer('sao2')->nullable();
            $table->integer('lactato')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complicacoes', function (Blueprint $table) {
            $table->dropColumn('debito_urinario');
            $table->dropColumn('ph');
            $table->dropColumn('pao2');
            $table->dropColumn('paco2');
            $table->dropColumn('hco3');
            $table->dropColumn('be');
            $table->dropColumn('sao2');
            $table->dropColumn('lactato');
        });
    }
}
