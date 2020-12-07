<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituacaoEtilismoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('situacao_etilismo')->insert(['id' => 1, 'descricao' => 'Etilista']);
        DB::table('situacao_etilismo')->insert(['id' => 2, 'descricao' => 'Ex- etilista']);
        DB::table('situacao_etilismo')->insert(['id' => 3, 'descricao' => 'Não etilista']);
        DB::table('situacao_etilismo')->insert(['id' => 4, 'descricao' => 'Não Informado']);
    }
}
