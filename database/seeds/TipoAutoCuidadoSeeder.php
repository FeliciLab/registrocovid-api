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
        DB::table('tipos_autocuidado')->insert(['id' => 1, 'descricao' => 'Mesma antes da doença']);
        DB::table('tipos_autocuidado')->insert(['id' => 2, 'descricao' => 'Pior']);
        DB::table('tipos_autocuidado')->insert(['id' => 3, 'descricao' => 'Desconhecida']);
    }
}
