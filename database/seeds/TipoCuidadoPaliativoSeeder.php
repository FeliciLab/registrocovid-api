<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCuidadoPaliativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_cuidado_paliativos')->insert(['id' => 1, 'descricao' => 'Sim']);
        DB::table('tipo_cuidado_paliativos')->insert(['id' => 2, 'descricao' => 'Não']);
        DB::table('tipo_cuidado_paliativos')->insert(['id' => 3, 'descricao' => 'Aguardando aval equipe CP']);
        DB::table('tipo_cuidado_paliativos')->insert(['id' => 4, 'descricao' => 'Não RCP por gravidade do caso']);
    }
}
