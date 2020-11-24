<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExamesEspecificosCamposParaNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exames_rt_pcr', function (Blueprint $table){
            $table->date('data_coleta')->nullable()->change();
            $table->foreignId('sitio_tipo_id')->nullable()->change();
        });

        Schema::table('exames_testes_rapidos', function (Blueprint $table){
            $table->date('data_realizacao')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exames_rt_pcr', function (Blueprint $table){
            $table->date('data_coleta')->change();
            $table->foreignId('sitio_tipo_id')->references('id')->on('sitio_tipo')->change();
        });

        Schema::table('exames_testes_rapidos', function (Blueprint $table){
            $table->date('data_realizacao')->change();
        });
    }
}
