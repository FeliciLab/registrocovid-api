<?php

use Illuminate\Database\Seeder;

class OrgaosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orgaos')->insert(['id' => 1,'descricao' => 'Coração']);
        DB::table('orgaos')->insert(['id' => 2,'descricao' => 'Córnea']);
        DB::table('orgaos')->insert(['id' => 3,'descricao' => 'Fígado']);
        DB::table('orgaos')->insert(['id' => 4,'descricao' => 'Pulmão']);
        DB::table('orgaos')->insert(['id' => 5,'descricao' => 'Rim']);
        DB::table('orgaos')->insert(['id' => 6,'descricao' => 'Outros']);
    }
}
