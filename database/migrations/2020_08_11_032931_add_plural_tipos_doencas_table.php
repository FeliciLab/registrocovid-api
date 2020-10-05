<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPluralTiposDoencasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('tipos_doenca', 'tipos_doencas');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doencas', function (Blueprint $table) {
            $table->dropForeign(['tipo_doenca_id']);
        });
        Schema::dropIfExists('tipos_doencas');
    }
}
