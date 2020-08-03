<?php

use Illuminate\Database\Seeder;

class DoencasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doencas')->insert(['id' => 1,'tipo_doenca_id' => 1,'descricao' => 'Doença arterial coronariana']);
        DB::table('doencas')->insert(['id' => 1,'tipo_doenca_id' => 1,'descricao' => 'Insuficiência cardíaca congestiva']);
        DB::table('doencas')->insert(['id' => 1,'tipo_doenca_id' => 1,'descricao' => 'Arritmia cardíaca']);
        DB::table('doencas')->insert(['id' => 1,'tipo_doenca_id' => 1,'descricao' => 'Cardiopatia não-especificada']);
        DB::table('doencas')->insert(['id' => 1,'tipo_doenca_id' => 2,'descricao' => 'Insuficiencia venosa']);
        DB::table('doencas')->insert(['id' => 1,'tipo_doenca_id' => 3,'descricao' => 'Doença pulmonar obstrutiva crônica']);
        DB::table('doencas')->insert(['id' => 1,'tipo_doenca_id' => 3,'descricao' => 'Asma']);
    }
}
