<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposSuporteRespiratorio extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_suporterespiratorio')->insert([
            'id'   => 1,
            'nome' => 'Máscara de reservatório',
        ]);

        DB::table('tipos_suporterespiratorio')->insert([
            'id'   => 2,
            'nome' => 'Catéter 02',
        ]);

        DB::table('tipos_suporterespiratorio')->insert([
            'id'   => 3,
            'nome' => 'Ventilação invasiva',
        ]);
        DB::statement("ALTER SEQUENCE tipos_suporterespiratorio_id_seq RESTART WITH 4;");
    }
}
