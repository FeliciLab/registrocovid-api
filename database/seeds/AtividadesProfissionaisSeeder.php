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
        // DB::table('atividadesprofissionais')->insert([
        //     'id'   => 1,
        //     'nome' => 'Sem Nenhuma Atividade',
        // ]);
        DB::table('atividadesprofissionais')->insert(['id' => 1, 'nome' => 'Sem Nenhuma Atividade']);
        DB::table('atividadesprofissionais')->insert(['id' => 2, 'nome' => 'Estudante']);
        DB::table('atividadesprofissionais')->insert(['id' => 3, 'nome' => 'Funcionário Público']);
        DB::table('atividadesprofissionais')->insert(['id' => 4, 'nome' => 'Trabalhador com Carteira Assinada']);
        DB::table('atividadesprofissionais')->insert(['id' => 5, 'nome' => 'Autônomo']);
        DB::table('atividadesprofissionais')->insert(['id' => 6, 'nome' => 'Dona de Casa']);
        DB::table('atividadesprofissionais')->insert(['id' => 7, 'nome' => 'Aposentado(a)']);
        DB::table('atividadesprofissionais')->insert(['id' => 8, 'nome' => 'Aposentado(a) por alguma doença']);
        DB::table('atividadesprofissionais')->insert(['id' => 9, 'nome' => 'Desempregado']);
        DB::table('atividadesprofissionais')->insert(['id' => 10, 'nome' => 'Desempregado por outros motivos']);
        DB::table('atividadesprofissionais')->insert(['id' => 11, 'nome' => 'Voluntário(a)']);
        DB::table('atividadesprofissionais')->insert(['id' => 12, 'nome' => 'Licenciado por outros motivos']);
        DB::table('atividadesprofissionais')->insert(['id' => 13, 'nome' => 'Profissional de Saúde']);
        DB::table('atividadesprofissionais')->insert(['id' => 14, 'nome' => 'Outra']);
    }
}
