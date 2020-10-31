<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MudarNomeAsculturaPulmonar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evolucoes_diarias', function ($table){
            $table->renameColumn('ascultura_pulmonar', 'ausculta_pulmonar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evolucoes_diarias', function ($table){
            $table->renameColumn('ausculta_pulmonar', 'ascultura_pulmonar');
        });
    }
}
