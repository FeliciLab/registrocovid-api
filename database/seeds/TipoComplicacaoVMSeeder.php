<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoComplicacaoVMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_complicacao_vm')->insert([
            'id'   => 1,
            'descricao' => 'Pneumotórax',
        ]);

        DB::table('tipos_complicacao_vm')->insert([
            'id'   => 2,
            'descricao' => 'Extubação acidental',
        ]);

        DB::table('tipos_complicacao_vm')->insert([
            'id'   => 3,
            'descricao' => 'Hemorragia',
        ]);

        DB::table('tipos_complicacao_vm')->insert([
            'id'   => 4,
            'descricao' => 'Necessidade transfusional',
        ]);

        DB::table('tipos_complicacao_vm')->insert([
            'id'   => 5,
            'descricao' => 'Outras',
        ]);
    }
}
