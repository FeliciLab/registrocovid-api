<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class AlterarCamposTabagismo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // php artisan make:migration alterar-campos-tabagismo
        Schema::create('situacao_tabagismo', function($table){
            $table->id();
            $table->string('descricao', 100);
            $table->timestamps();
        });
    
        Artisan::call('db:seed', ['--class' => 'SituacaoTabagismoSeeder', '--force' => true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('situacao_tabagismo');
    }
}
