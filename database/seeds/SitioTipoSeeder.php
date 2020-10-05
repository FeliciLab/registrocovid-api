<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitioTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sitios_tipos')->insert(['id' => 1, 'descricao' => 'Swab de nasofaringe/orofaringe']);
        DB::table('sitios_tipos')->insert(['id' => 2, 'descricao' => 'Escarro']);
        DB::table('sitios_tipos')->insert(['id' => 3, 'descricao' => 'Secreção traqueal']);
        DB::table('sitios_tipos')->insert(['id' => 4, 'descricao' => 'Lavado broncoalveolar']);
        DB::table('sitios_tipos')->insert(['id' => 5, 'descricao' => 'Outros']);
    }
}
