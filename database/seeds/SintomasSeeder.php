<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintomasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sintomas')->insert(['id' => 1,'nome' => 'Coriza']);
        DB::table('sintomas')->insert(['id' => 2,'nome' => 'Tosse (seca ou produtiva)']);
        DB::table('sintomas')->insert(['id' => 3,'nome' => 'Calafrios']);
        DB::table('sintomas')->insert(['id' => 4,'nome' => 'Febre']);
        DB::table('sintomas')->insert(['id' => 5,'nome' => 'Dispneia']);
        DB::table('sintomas')->insert(['id' => 6,'nome' => 'Fadiga']);
        DB::table('sintomas')->insert(['id' => 7,'nome' => 'Anorexia']);
        DB::table('sintomas')->insert(['id' => 8,'nome' => 'Mialgia']);
        DB::table('sintomas')->insert(['id' => 9,'nome' => 'Astenia']);
        DB::table('sintomas')->insert(['id' => 10,'nome' => 'Dor de Garganta']);
        DB::table('sintomas')->insert(['id' => 11,'nome' => 'Congestão Nasal']);
        DB::table('sintomas')->insert(['id' => 12,'nome' => 'Cefaléia']);
        DB::table('sintomas')->insert(['id' => 13,'nome' => 'Diarréia']);
        DB::table('sintomas')->insert(['id' => 14,'nome' => 'Náusea']);
        DB::table('sintomas')->insert(['id' => 15,'nome' => 'Vômitos']);
        DB::table('sintomas')->insert(['id' => 16,'nome' => 'Anosmia']);
        DB::table('sintomas')->insert(['id' => 17,'nome' => 'Ageusia']);
        DB::table('sintomas')->insert(['id' => 18,'nome' => 'Síndrome Gripal']);

    }
}
