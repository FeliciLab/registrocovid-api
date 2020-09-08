<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoAutoCuidadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_auto_cuidados')->insert(['id' => 1, 'descricao' => 'Mesma antes da doença']);
        DB::table('tipo_auto_cuidados')->insert(['id' => 2, 'descricao' => 'Pior']);
        DB::table('tipo_auto_cuidados')->insert(['id' => 3, 'descricao' => 'Desconhecida']);
    }
}
