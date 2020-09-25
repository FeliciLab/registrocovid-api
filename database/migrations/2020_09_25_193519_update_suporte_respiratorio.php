<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSuporteRespiratorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suportes_respiratorios', function (Blueprint $table) {
            $table->renameColumn('parametro', 'fluxo_o2');
            $table->float('concentracao_o2')->nullable();
            $table->float('fluxo_sangue')->nullable();
            $table->float('fluxo_gasoso')->nullable();
            $table->float('fio2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suportes_respiratorios', function (Blueprint $table) {
            //
        });
    }
}
