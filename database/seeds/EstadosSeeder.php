<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert(['id'   => 1 ,'nome' => 'Acre', 'unidade_federativa' => 'AC']);
        DB::table('estados')->insert(['id'   => 2 ,'nome' => 'Alagoas', 'unidade_federativa' => 'AL']);
        DB::table('estados')->insert(['id'   => 3 ,'nome' => 'Amazonas', 'unidade_federativa' => 'AM']);
        DB::table('estados')->insert(['id'   => 4 ,'nome' => 'Amapá', 'unidade_federativa' => 'AP']);
        DB::table('estados')->insert(['id'   => 5 ,'nome' => 'Bahia', 'unidade_federativa' => 'BA']);
        DB::table('estados')->insert(['id'   => 6 ,'nome' => 'Ceará', 'unidade_federativa' => 'CE']);
        DB::table('estados')->insert(['id'   => 7 ,'nome' => 'Distrito Federal', 'unidade_federativa' => 'DF']);
        DB::table('estados')->insert(['id'   => 8 ,'nome' => 'Espírito Santo', 'unidade_federativa' => 'ES']);
        DB::table('estados')->insert(['id'   => 9 ,'nome' => 'Goiás', 'unidade_federativa' => 'GO']);
        DB::table('estados')->insert(['id'   => 10, 'nome' => 'Maranhão', 'unidade_federativa' => 'MA']);
        DB::table('estados')->insert(['id'   => 11, 'nome' => 'Minas Gerais', 'unidade_federativa' => 'MG']);
        DB::table('estados')->insert(['id'   => 12, 'nome' => 'Mato Grosso do Sul', 'unidade_federativa' => 'MS']);
        DB::table('estados')->insert(['id'   => 13, 'nome' => 'Mato Grosso', 'unidade_federativa' => 'MT']);
        DB::table('estados')->insert(['id'   => 14, 'nome' => 'Pará', 'unidade_federativa' => 'PA']);
        DB::table('estados')->insert(['id'   => 15, 'nome' => 'Paraíba', 'unidade_federativa' => 'PB']);
        DB::table('estados')->insert(['id'   => 16, 'nome' => 'Pernambuco', 'unidade_federativa' => 'PE']);
        DB::table('estados')->insert(['id'   => 17, 'nome' => 'Piauí', 'unidade_federativa' => 'PI']);
        DB::table('estados')->insert(['id'   => 18, 'nome' => 'Paraná', 'unidade_federativa' => 'PR']);
        DB::table('estados')->insert(['id'   => 19, 'nome' => 'Rio de Janeiro', 'unidade_federativa' => 'RJ']);
        DB::table('estados')->insert(['id'   => 20, 'nome' => 'Rio Grande do Norte', 'unidade_federativa' => 'RN']);
        DB::table('estados')->insert(['id'   => 21, 'nome' => 'Rondônia', 'unidade_federativa' => 'RO']);
        DB::table('estados')->insert(['id'   => 22, 'nome' => 'Roraima', 'unidade_federativa' => 'RR']);
        DB::table('estados')->insert(['id'   => 23, 'nome' => 'Rio Grande do Sul', 'unidade_federativa' => 'RA']);
        DB::table('estados')->insert(['id'   => 24, 'nome' => 'Santa Catarina', 'unidade_federativa' => 'SC']);
        DB::table('estados')->insert(['id'   => 25, 'nome' => 'Sergipe', 'unidade_federativa' => 'SE']);
        DB::table('estados')->insert(['id'   => 26, 'nome' => 'São Paulo', 'unidade_federativa' => 'SP']);
        DB::table('estados')->insert(['id'   => 27, 'nome' => 'Tocantins', 'unidade_federativa' => 'TO']);
    }
}
