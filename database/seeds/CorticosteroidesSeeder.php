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
        DB::table('corticosteroides')->insert(['id' => 1,'descricao' => 'Prednisona > 20 mg/dia']);
        DB::table('corticosteroides')->insert(['id' => 2,'descricao' => 'Hidrocortisona > 80 mg/dia']);
        DB::table('corticosteroides')->insert(['id' => 3,'descricao' => 'Metilprednisolona > 16 mg/dia']);
        DB::table('corticosteroides')->insert(['id' => 4,'descricao' => 'Dexametasona > 3 mg/dia']);
    }
}
