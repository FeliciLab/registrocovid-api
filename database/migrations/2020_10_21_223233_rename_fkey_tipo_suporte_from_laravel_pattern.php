<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFkeyTipoSuporteFromLaravelPattern extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipos_suportes_respiratorios_pacientes', function (Blueprint $table) {
            $table->renameColumn('tipo_suporte_id', 'tipo_suporte_respiratorio_id');
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
            $table->renameColumn('tipo_suporte_respiratorio_id', 'tipo_suporte_id');
        });
    }
}
