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
            'nome' => 'Catéter nasal de baixo fluxo',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 2,
            'nome' => 'Catéter nasal de alto fluxo',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 3,
            'nome' => 'Máscara de Venturi',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 4,
            'nome' => 'Máscara com reservatório',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 5,
            'nome' => 'Ventilação mecânica não invasiva (VNI)',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 6,
            'nome' => 'Ventilação mecânica invasiva',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 7,
            'nome' => 'Intubação Orotraqueal',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 8,
            'nome' => 'Traqueostomia',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 9,
            'nome' => 'Oxigenação por membrana extracorpórea (ECMO)',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 10,
            'nome' => 'Pronação',
        ]);

        DB::table('tipos_suportes_respiratorios')->insert([
            'id'   => 11,
            'nome' => 'Inclusão em desmame da ventilação mecânica',
        ]);
    }
}
