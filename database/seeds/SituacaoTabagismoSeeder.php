<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituacaoTabagismoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('situacao_tabagismo')->insert(['id' => 1, 'descricao' => 'Fumante']);
        DB::table('situacao_tabagismo')->insert(['id' => 2, 'descricao' => 'Ex-Fumante']);
        DB::table('situacao_tabagismo')->insert(['id' => 3, 'descricao' => 'Não Fumante']);
        DB::table('situacao_tabagismo')->insert(['id' => 4, 'descricao' => 'Não Informado']);
    }
}
