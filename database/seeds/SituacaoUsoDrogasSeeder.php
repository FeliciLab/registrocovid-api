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
        DB::table('situacoes_uso_drogas')->delete();
        DB::table('situacoes_uso_drogas')->insert(['id' => 1, 'descricao' => 'É usuário']);
        DB::table('situacoes_uso_drogas')->insert(['id' => 2, 'descricao' => 'Ex-usuário']);
        DB::table('situacoes_uso_drogas')->insert(['id' => 3, 'descricao' => 'Nunca usou drogas']);
        DB::table('situacoes_uso_drogas')->insert(['id' => 4, 'descricao' => 'Não Informado']);
        DB::statement("ALTER SEQUENCE situacao_uso_drogas_id_seq RESTART WITH 5;");
    }
}
