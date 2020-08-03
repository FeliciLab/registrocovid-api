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
        DB::table('orgaos')->insert(['id' => 2,'descricao' => 'Estômago']);
        DB::table('orgaos')->insert(['id' => 3,'descricao' => 'Fígado']);
    }
}
