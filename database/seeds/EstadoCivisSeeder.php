<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoCivisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados_civis')->insert([
            'id'   => 1,
            'nome' => 'CASADO',
        ]);

        DB::table('estados_civis')->insert([
            'id'   => 2,
            'nome' => 'DIVORCIADO',
        ]);

        DB::table('estados_civis')->insert([
            'id'   => 3,
            'nome' => 'NAO INFORMADO',
        ]);

        DB::table('estados_civis')->insert([
            'id'   => 4,
            'nome' => 'SEPARADO',
        ]);

        DB::table('estados_civis')->insert([
            'id'   => 5,
            'nome' => 'SOLTEIRO',
        ]);

        DB::table('estados_civis')->insert([
            'id'   => 6,
            'nome' => 'SOLTEIRO  EMANCIPADO',
        ]);

        DB::table('estados_civis')->insert([
            'id'   => 7,
            'nome' => 'UNIAO ESTAVEL',
        ]);

        DB::table('estados_civis')->insert([
            'id'   => 8,
            'nome' => 'VIUVO',
        ]);
    }
}
