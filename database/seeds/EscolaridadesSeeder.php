<?php

use Illuminate\Database\Seeder;

class EscolaridadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escolaridades')->insert(['id' => 1,'nome' => 'Analfabeto']);
        DB::table('escolaridades')->insert(['id' => 2,'nome' => 'Ensino Fundamental Incompleto (1ºG)']);
        DB::table('escolaridades')->insert(['id' => 3,'nome' => 'Ensino Fundamental Completo']);
        DB::table('escolaridades')->insert(['id' => 4,'nome' => 'Ensino Médio Incompleto (2ºG)']);
        DB::table('escolaridades')->insert(['id' => 6,'nome' => 'Ensino Médio Completo']);
        DB::table('escolaridades')->insert(['id' => 7,'nome' => 'Ensino Superior Incompleto']);
        DB::table('escolaridades')->insert(['id' => 8,'nome' => 'Ensino Superior Completo']);
        DB::table('escolaridades')->insert(['id' => 9,'nome' => 'Pós-Graduação']);
    }
}
