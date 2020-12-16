<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFluxoo2Fio2Paciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipos_suportes_respiratorios_pacientes', function (Blueprint $table) {
            $table->float('fluxo_o2')->nullable();
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
        Schema::table('tipos_suportes_respiratorios_pacientes', function (Blueprint $table) {
            $table->dropColumn('fluxo_o2');
            $table->dropColumn('fio2');
        });
    }
}
