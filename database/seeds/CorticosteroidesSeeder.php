<?php

use Illuminate\Database\Seeder;

class CorticosteroidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('corticosteroides')->insert(['id' => 1,'descricao' => 'Prednisona > 40 mg/dia']);
        DB::table('corticosteroides')->insert(['id' => 2,'descricao' => 'Hidrocortisona > 160 mg/dia']);
        DB::table('corticosteroides')->insert(['id' => 3,'descricao' => 'Metilprednisolona > 32 mg/dia']);
        DB::table('corticosteroides')->insert(['id' => 4,'descricao' => 'Dexametasona > 6 mg/dia']);
    }
}
