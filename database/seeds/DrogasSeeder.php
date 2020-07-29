<?php

use Illuminate\Database\Seeder;

class DrogasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drogas')->insert(['id' => 1,'descricao' => 'Maconha']);
        DB::table('drogas')->insert(['id' => 2,'descricao' => 'Cocaína']);
        DB::table('drogas')->insert(['id' => 3,'descricao' => 'Crack']);
        DB::table('drogas')->insert(['id' => 4,'descricao' => 'Ecstasy']);
    }
}
