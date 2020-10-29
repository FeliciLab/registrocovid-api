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
            'nome' => 'Branca',
        ]);

        DB::table('cores')->insert([
            'id'   => 2,
            'nome' => 'Preta',
        ]);

        DB::table('cores')->insert([
            'id'   => 3,
            'nome' => 'Parda/mulata',
        ]);

        DB::table('cores')->insert([
            'id'   => 4,
            'nome' => 'Amarela/Oriental',
        ]);

        DB::table('cores')->insert([
            'id'   => 5,
            'nome' => 'Raça indígena',
        ]);

        DB::table('cores')->insert([
            'id'   => 6,
            'nome' => 'Não Informado',
        ]);
    }
}
