<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RtPcrResultadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rt_pcr_resultados')->insert(['id' => 1, 'descricao' => 'Detectável']);
        DB::table('rt_pcr_resultados')->insert(['id' => 2, 'descricao' => 'Não detectável']);
        DB::table('rt_pcr_resultados')->insert(['id' => 3, 'descricao' => 'Inconclusivo']);
    }
}
