<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SuporteDataTerminoNullToDivideSuporte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suportes_respiratorios', function (Blueprint $table) {
            $table->date('data_termino')->nullable()->change();
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
            $table->date('data_termino')->change();
        });
    }
}
