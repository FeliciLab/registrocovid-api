<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituacaoUsoDrogasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('situacao_uso_drogas')->insert(['id' => 1,'descricao' => 'É usuário']);
        DB::table('situacao_uso_drogas')->insert(['id' => 2,'descricao' => 'Ex-usuário']);
        DB::table('situacao_uso_drogas')->insert(['id' => 3,'descricao' => 'Nunca usou drogas']);
    }
}
