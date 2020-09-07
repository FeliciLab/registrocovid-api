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
        DB::table('tipos_cuidado_paliativo')->insert(['id' => 1, 'descricao' => 'Sim']);
        DB::table('tipos_cuidado_paliativo')->insert(['id' => 2, 'descricao' => 'Não']);
        DB::table('tipos_cuidado_paliativo')->insert(['id' => 3, 'descricao' => 'Aguardando aval equipe CP']);
        DB::table('tipos_cuidado_paliativo')->insert(['id' => 4, 'descricao' => 'Não RCP por gravidade do caso']);
    }
}
