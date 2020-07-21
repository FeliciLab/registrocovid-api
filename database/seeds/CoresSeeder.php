<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cores')->insert([
            'id'   => 1,
            'nome' => 'AMARELO',
        ]);

        DB::table('cores')->insert([
            'id'   => 2,
            'nome' => 'BRANCO',
        ]);

        DB::table('cores')->insert([
            'id'   => 3,
            'nome' => 'INDÍGENA',
        ]);

        DB::table('cores')->insert([
            'id'   => 4,
            'nome' => 'NÃO INFORMADO',
        ]);

        DB::table('cores')->insert([
            'id'   => 5,
            'nome' => 'NEGRO',
        ]);

        DB::table('cores')->insert([
            'id'   => 6,
            'nome' => 'PARDO/MULATO',
        ]);
    }
}
