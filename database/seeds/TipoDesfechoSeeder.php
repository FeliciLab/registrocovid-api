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
        DB::table('tipo_desfechos')->insert(['id' => 1, 'descricao' => 'Alta hospitalar']);
        DB::table('tipo_desfechos')->insert(['id' => 2, 'descricao' => 'Transferência para outro serviço']);
        DB::table('tipo_desfechos')->insert(['id' => 3, 'descricao' => 'Cuidados paliativos']);
        DB::table('tipo_desfechos')->insert(['id' => 4, 'descricao' => 'Óbito']);
    }
}
