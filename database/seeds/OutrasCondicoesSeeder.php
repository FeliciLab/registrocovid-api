<?php

use Illuminate\Database\Seeder;

class OutrasCondicoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outras_condicoes')->insert(['id' => 1,'descricao' => 'Teste']);
        DB::table('outras_condicoes')->insert(['id' => 2,'descricao' => 'Teste2']);
    }
}
