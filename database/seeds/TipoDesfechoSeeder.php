<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDesfechoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_desfecho')->insert(['id' => 1, 'descricao' => 'Alta']);
        DB::table('tipos_desfecho')->insert(['id' => 2, 'descricao' => 'Transferência para outro serviço']);
        DB::table('tipos_desfecho')->insert(['id' => 3, 'descricao' => 'Óbito']);
    }
}
