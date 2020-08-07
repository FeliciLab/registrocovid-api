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
        DB::table('sitio_tipo')->insert(['id' => 1, 'descricao' => 'Swab de nasofaringe/orofaringe']);
        DB::table('sitio_tipo')->insert(['id' => 2, 'descricao' => 'Escarro']);
        DB::table('sitio_tipo')->insert(['id' => 3, 'descricao' => 'Secreção traqueal']);
        DB::table('sitio_tipo')->insert(['id' => 4, 'descricao' => 'Lavado broncoalveolar']);
        DB::table('sitio_tipo')->insert(['id' => 5, 'descricao' => 'Outros']);
    }
}
