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
        DB::table('estadocivis')->insert([
            'id'   => 1,
            'nome' => 'CASADO',
        ]);

        DB::table('estadocivis')->insert([
            'id'   => 2,
            'nome' => 'DIVORCIADO',
        ]);

        DB::table('estadocivis')->insert([
            'id'   => 3,
            'nome' => 'NAO INFORMADO',
        ]);

        DB::table('estadocivis')->insert([
            'id'   => 4,
            'nome' => 'SEPARADO',
        ]);

        DB::table('estadocivis')->insert([
            'id'   => 5,
            'nome' => 'SOLTEIRO',
        ]);

        DB::table('estadocivis')->insert([
            'id'   => 6,
            'nome' => 'SOLTEIRO  EMANCIPADO',
        ]);

        DB::table('estadocivis')->insert([
            'id'   => 7,
            'nome' => 'UNIAO ESTAVEL',
        ]);

        DB::table('estadocivis')->insert([
            'id'   => 8,
            'nome' => 'VIUVO',
        ]);
    }
}
