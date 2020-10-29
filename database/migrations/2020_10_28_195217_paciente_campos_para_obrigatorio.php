<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Doctrine\DBAL\Types\StringType; 
use Doctrine\DBAL\Types\Type;

class PacienteCamposParaObrigatorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Type::hasType('char')) {
            Type::addType('char', StringType::class);
        }
        Schema::table('pacientes', function (Blueprint $table) {
            $table->char('sexo', 1)->nullable(false)->change();
            $table->date('data_nascimento')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Type::hasType('char')) {
            Type::addType('char', StringType::class);
        }
        Schema::table('pacientes', function (Blueprint $table) {
            $table->char('sexo', 1)->nullable()->change();
            $table->date('data_nascimento')->nullable()->change();
        });
    }
}
