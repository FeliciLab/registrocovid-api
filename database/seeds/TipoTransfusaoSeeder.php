<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoTransfusaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_transfusao')->insert([
            'id'   => 1,
            'descricao' => 'Sangue total',
        ]);

        DB::table('tipos_transfusao')->insert([
            'id'   => 2,
            'descricao' => 'Concentrado de hemácias',
        ]);

        DB::table('tipos_transfusao')->insert([
            'id'   => 3,
            'descricao' => 'Concentrado de plaquetas',
        ]);

        DB::table('tipos_transfusao')->insert([
            'id'   => 4,
            'descricao' => 'Plasma fresco congelado',
        ]);

        DB::table('tipos_transfusao')->insert([
            'id'   => 5,
            'descricao' => 'Outro',
        ]);
    }
}
