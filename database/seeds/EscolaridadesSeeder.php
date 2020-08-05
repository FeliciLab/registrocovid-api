<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscolaridadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escolaridades')->insert([
            'id'   => 1,
            'nome' => 'Ensino Fundamental',
        ]);

        DB::table('escolaridades')->insert([
            'id'   => 2,
            'nome' => 'Ensino Médio',
        ]);

        DB::table('escolaridades')->insert([
            'id'   => 3,
            'nome' => 'Superior (Graduação)',
        ]);

        DB::table('escolaridades')->insert([
            'id'   => 4,
            'nome' => 'Pós-graduação.',
        ]);

        DB::table('escolaridades')->insert([
            'id'   => 5,
            'nome' => 'Mestrado',
        ]);

        DB::table('escolaridades')->insert([
            'id'   => 6,
            'nome' => 'Doutorado',
        ]);
    }
}
