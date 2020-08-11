<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPluralExamesTesteRapidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('exames_teste_rapido', 'exames_testes_rapidos');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exames_testes_rapidos', function (Blueprint $table) {
            $table->dropForeign(['paciente_id']);
        });
        Schema::dropIfExists('exames_testes_rapidos');
    }
}
