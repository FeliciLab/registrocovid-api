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
        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 1,
            'nome' => 'Máscara de reservatório',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 2,
            'nome' => 'Catéter de 02',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 3,
            'nome' => 'Ventilação invasiva',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 4,
            'nome' => 'Tubo',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 5,
            'nome' => 'Traqueostomia',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 6,
            'nome' => 'Cânula nasal de alto fluxo',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 7,
            'nome' => 'Pronação',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 8,
            'nome' => 'Inclusão no desmame da VM',
        ]);
    }
}
