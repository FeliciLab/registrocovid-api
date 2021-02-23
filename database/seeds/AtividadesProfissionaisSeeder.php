<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AtividadesProfissionaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('atividades_profissionais')->insert(['id' => 1,'nome' => 'Sem Nenhuma Atividade']);
        DB::table('atividades_profissionais')->insert(['id' => 2,'nome' => 'Estudante']);
        DB::table('atividades_profissionais')->insert(['id' => 3,'nome' => 'Funcionário Público']);
        DB::table('atividades_profissionais')->insert(['id' => 4,'nome' => 'Trabalhador com Carteira Assinada']);
        DB::table('atividades_profissionais')->insert(['id' => 5,'nome' => 'Autônomo']);
        DB::table('atividades_profissionais')->insert(['id' => 6,'nome' => 'Dona de Casa']);
        DB::table('atividades_profissionais')->insert(['id' => 7,'nome' => 'Aposentado(a)']);
        DB::table('atividades_profissionais')->insert(['id' => 8,'nome' => 'Aposentado(a) por alguma doença']);
        DB::table('atividades_profissionais')->insert(['id' => 9,'nome' => 'Desempregado']);
        DB::table('atividades_profissionais')->insert(['id' => 10,'nome' => 'Desempregado por outros motivos']);
        DB::table('atividades_profissionais')->insert(['id' => 11,'nome' => 'Voluntário(a)']);
        DB::table('atividades_profissionais')->insert(['id' => 12,'nome' => 'Licenciado por outros motivos']);
        DB::table('atividades_profissionais')->insert(['id' => 13,'nome' => 'Profissional de Saúde']);
        DB::table('atividades_profissionais')->insert(['id' => 14, 'nome' => 'Outra']);
        DB::table('atividades_profissionais')->insert(['id' => 15, 'nome' => 'Não informado']);
    }
}
