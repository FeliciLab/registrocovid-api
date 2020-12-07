<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IncluirSituacoesNoHistorico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historicos', function (Blueprint $table) {
            $table->dropColumn('tabagismo');
            $table->dropColumn('etilismo');
            $table->foreignId('situacao_tabagismo_id')->nullable()->references('id')->on('situacao_tabagismo');
            $table->foreignId('situacao_etilismo_id')->nullable()->references('id')->on('situacao_etilismo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('historicos', function (Blueprint $table) {
            $table->dropForeign('situacao_tabagismo_id');
            $table->dropForeign('situacao_etilismo_id');
            $table->boolean('tabagismo')->nullable();
            $table->boolean('etilismo')->nullable();
        });
    }
}
