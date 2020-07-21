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
        DB::table('estados')->insert(['id'   => 1 ,'nome' => 'Acre']);
        DB::table('estados')->insert(['id'   => 2 ,'nome' => 'Alagoas']);
        DB::table('estados')->insert(['id'   => 3 ,'nome' => 'Amazonas']);
        DB::table('estados')->insert(['id'   => 4 ,'nome' => 'Amapá']);
        DB::table('estados')->insert(['id'   => 5 ,'nome' => 'Bahia']);
        DB::table('estados')->insert(['id'   => 6 ,'nome' => 'Ceará']);
        DB::table('estados')->insert(['id'   => 7 ,'nome' => 'Distrito Federal']);
        DB::table('estados')->insert(['id'   => 8 ,'nome' => 'Espírito Santo']);
        DB::table('estados')->insert(['id'   => 9 ,'nome' => 'Goiás']);
        DB::table('estados')->insert(['id'   => 10, 'nome' => 'Maranhão']);
        DB::table('estados')->insert(['id'   => 11, 'nome' => 'Minas Gerais']);
        DB::table('estados')->insert(['id'   => 12, 'nome' => 'Mato Grosso do Sul']);
        DB::table('estados')->insert(['id'   => 13, 'nome' => 'Mato Grosso']);
        DB::table('estados')->insert(['id'   => 14, 'nome' => 'Pará']);
        DB::table('estados')->insert(['id'   => 15, 'nome' => 'Paraíba']);
        DB::table('estados')->insert(['id'   => 16, 'nome' => 'Pernambuco']);
        DB::table('estados')->insert(['id'   => 17, 'nome' => 'Piauí']);
        DB::table('estados')->insert(['id'   => 18, 'nome' => 'Paraná']);
        DB::table('estados')->insert(['id'   => 19, 'nome' => 'Rio de Janeiro']);
        DB::table('estados')->insert(['id'   => 20, 'nome' => 'Rio Grande do Norte']);
        DB::table('estados')->insert(['id'   => 21, 'nome' => 'Rondônia']);
        DB::table('estados')->insert(['id'   => 22, 'nome' => 'Roraima']);
        DB::table('estados')->insert(['id'   => 23, 'nome' => 'Rio Grande do Sul']);
        DB::table('estados')->insert(['id'   => 24, 'nome' => 'Santa Catarina']);
        DB::table('estados')->insert(['id'   => 25, 'nome' => 'Sergipe']);
        DB::table('estados')->insert(['id'   => 26, 'nome' => 'São Paulo']);
        DB::table('estados')->insert(['id'   => 27, 'nome' => 'Tocantins']);
    }
}
