<?php

use Illuminate\Database\Seeder;

class MedicacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicacoes')->insert(['id' => 1,'descricao' => 'Teste']);
        DB::table('medicacoes')->insert(['id' => 2,'descricao' => 'Teste2']);
    }
}
