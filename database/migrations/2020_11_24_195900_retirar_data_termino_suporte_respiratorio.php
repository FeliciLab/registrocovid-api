<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RetirarDataTerminoSuporteRespiratorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suportes_respiratorios', function ($table){
            $table->dropColumn('data_termino');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suportes_respiratorios', function ($table){
            $table->date('data_termino');
        });
    }
}
