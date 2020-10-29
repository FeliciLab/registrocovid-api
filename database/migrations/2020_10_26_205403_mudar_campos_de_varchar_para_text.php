<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MudarCamposDeVarcharParaText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complicacoes', function ($table){
            $table->text('descricao')->nullable()->change();
        });
        Schema::table('complicacoes_ventilacao_mec', function ($table){
            $table->text('descricao')->nullable()->change();
        });
        Schema::table('corticosteroides', function ($table){
            $table->text('descricao')->change();
        });
        Schema::table('desfechos', function ($table){
            $table->text('causa_obito')->nullable()->change();
        });
        Schema::table('doencas', function ($table){
            $table->text('descricao')->change();
        });
        Schema::table('drogas', function ($table){
            $table->text('descricao')->change();
        });
        Schema::table('evolucoes_diarias', function ($table){
            $table->text('ascultura_pulmonar')->nullable()->change();
        });
        Schema::table('exames_complementares', function ($table){
            $table->text('resultado')->change();
        });
        Schema::table('iras', function ($table){
            $table->text('descricao')->nullable()->change();
        });
        Schema::table('tratamento_suportes', function ($table){
            $table->text('motivo_hemodialise')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complicacoes', function ($table){
            $table->string('descricao')->nullable()->change();
        });
        Schema::table('complicacoes_ventilacao_mec', function ($table){
            $table->string('descricao')->nullable()->change();
        });
        Schema::table('corticosteroides', function ($table){
            $table->string('descricao')->change();
        });
        Schema::table('desfechos', function ($table){
            $table->string('causa_obito')->nullable()->change();
        });
        Schema::table('doencas', function ($table){
            $table->string('descricao')->change();
        });
        Schema::table('drogas', function ($table){
            $table->string('descricao')->change();
        });
        Schema::table('evolucoes_diarias', function ($table){
            $table->string('ascultura_pulmonar')->nullable()->change();
        });
        Schema::table('exames_complementares', function ($table){
            $table->string('resultado')->change();
        });
        Schema::table('iras', function ($table){
            $table->string('descricao')->nullable()->change();
        });
        Schema::table('tratamento_suportes', function ($table){
            $table->string('motivo_hemodialise')->nullable()->change();
        });
    }
}
