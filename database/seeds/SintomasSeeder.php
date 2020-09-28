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
        DB::table('sintomas')->insert(['id' => 2,'nome' => 'Congestão Nasal']);
        DB::table('sintomas')->insert(['id' => 3,'nome' => 'Tosse (seca ou produtiva)']);
        DB::table('sintomas')->insert(['id' => 4,'nome' => 'Calafrios']);
        DB::table('sintomas')->insert(['id' => 5,'nome' => 'Febre']);
        DB::table('sintomas')->insert(['id' => 6,'nome' => 'Dispneia (falta de ar / dificuldade para respirar)']);
        DB::table('sintomas')->insert(['id' => 7,'nome' => 'Fadiga']);
        DB::table('sintomas')->insert(['id' => 8,'nome' => 'Hiporexia / Anorexia (diminuição ou perda do apetite)']);
        DB::table('sintomas')->insert(['id' => 9,'nome' => 'Mialgia (dor muscular)']);
        DB::table('sintomas')->insert(['id' => 10,'nome' => 'Astenia (cansaço)']);
        DB::table('sintomas')->insert(['id' => 11,'nome' => 'Odinofagia (dor de garganta)']);
        DB::table('sintomas')->insert(['id' => 12,'nome' => 'Cefaleia']);
        DB::table('sintomas')->insert(['id' => 13,'nome' => 'Diarreia']);
        DB::table('sintomas')->insert(['id' => 14,'nome' => 'Náusea']);
        DB::table('sintomas')->insert(['id' => 15,'nome' => 'Vômitos']);
        DB::table('sintomas')->insert(['id' => 16,'nome' => 'Mal estar']);
        DB::table('sintomas')->insert(['id' => 17,'nome' => 'Hiposmia / Anosmia (alteração ou perda do olfato)']);
        DB::table('sintomas')->insert(['id' => 18,'nome' => 'Disgeusia / Ageusia (alteração ou perda do paladar)']);
        DB::table('sintomas')->insert(['id' => 19,'nome' => 'Adinamia']);
        DB::table('sintomas')->insert(['id' => 20,'nome' => 'Síndrome gripal']);
        DB::table('sintomas')->insert(['id' => 21,'nome' => 'Dor abdominal']);
        DB::table('sintomas')->insert(['id' => 22,'nome' => 'Dor torácica']);
        DB::table('sintomas')->insert(['id' => 23,'nome' => 'Artralgia (dor articular)']);
        DB::table('sintomas')->insert(['id' => 24,'nome' => 'Outros']);
    }
}
