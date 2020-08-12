<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPluralRtPcrResultadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('rt_pcr_resultado', 'rt_pcr_resultados');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exames_rt_pcr', function (Blueprint $table) {
            $table->dropForeign(['rt_pcr_resultado_id']);
        });
        Schema::dropIfExists('rt_pcr_resultados');
    }
}
