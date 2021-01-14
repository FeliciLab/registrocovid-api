<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstituicoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instituicoes')->insert(['nome' => 'Hospital Leonardo da Vinci', 'estudo' => true]);
        DB::table('instituicoes')->insert(['nome' => 'Hospital Geral Dr César Cals', 'estudo' => true]);
        DB::table('instituicoes')->insert(['nome' => 'Hospital Geral de Fortaleza', 'estudo' => true]);
        DB::table('instituicoes')->insert(['nome' => 'Hospital de Messejana', 'estudo' => true]);
        DB::table('instituicoes')->insert(['nome' => 'Hospital Regional Norte', 'estudo' => true]);
        DB::table('instituicoes')->insert(['nome' => 'Hospital Regional do Sertão Central', 'estudo' => true]);
        DB::table('instituicoes')->insert(['nome' => 'Hospital São José', 'estudo' => true]);
        DB::table('instituicoes')->insert(['nome' => 'Hospital Regional do Cariri', 'estudo' => true]);
        DB::table('instituicoes')->insert(['nome' => 'Hospital Infantil Albert Sabin', 'estudo' => true]);
        DB::table('instituicoes')->insert(['nome' => 'Hospital Batista', 'estudo' => true]);

        DB::table('instituicoes')->insert(['nome' => 'UPA - Autran Nunes', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Bom Jardim', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Canindezinho', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Caucaia', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Conjunto Ceará', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Cristo Redentor', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Dendê', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Horizonte', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Itaperi', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Jangurussu', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - José Walter', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Jurema', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Maracanaú', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Maranguape', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Messejana', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Praia do Futuro', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - São Gonçalo do Amarante', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'UPA - Vila Velha', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'Outro hospital', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'Outra unidade de saúde', 'estudo' => false]);
        DB::table('instituicoes')->insert(['nome' => 'Hospital Waldemar de Alcântara', 'estudo' => false]);
    }
}
