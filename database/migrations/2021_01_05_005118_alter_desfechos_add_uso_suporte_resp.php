<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDesfechosAddUsoSuporteResp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('desfechos', function (Blueprint $table) {
            $table->boolean("uso_suporte_respiratorio")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('desfechos', function (Blueprint $table) {
            $table->dropColumn("uso_suporte_respiratorio");
        });
    }
}
