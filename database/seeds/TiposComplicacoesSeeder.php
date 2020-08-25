<?php

use Illuminate\Database\Seeder;

class TiposComplicacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_complicacoes')->insert(['id' => 1,'descricao' => 'UTI']);
        DB::table('tipos_complicacoes')->insert(['id' => 2,'descricao' => 'Síndrome Respiratória Aguda Grave (SRAG)']);
        DB::table('tipos_complicacoes')->insert(['id' => 3,'descricao' => 'SARA']);
        DB::table('tipos_complicacoes')->insert(['id' => 4,'descricao' => 'Arritmia cardíaca']);
        DB::table('tipos_complicacoes')->insert(['id' => 5,'descricao' => 'Insuficiência renal aguda']);
        DB::table('tipos_complicacoes')->insert(['id' => 6,'descricao' => 'Disfunção hepática']);
        DB::table('tipos_complicacoes')->insert(['id' => 7,'descricao' => 'Sepse']);
        DB::table('tipos_complicacoes')->insert(['id' => 8,'descricao' => 'Choque séptico']);
        DB::table('tipos_complicacoes')->insert(['id' => 9,'descricao' => 'Choque hipovolêmico']);
        DB::table('tipos_complicacoes')->insert(['id' => 10,'descricao' => 'Disfunção múltipla de órgãos']);
        DB::table('tipos_complicacoes')->insert(['id' => 11,'descricao' => 'Fenômenos tromboembólicos (TVP)']);
        DB::table('tipos_complicacoes')->insert(['id' => 12,'descricao' => 'Fenômenos tromboembólicos (TEP)']);
        DB::table('tipos_complicacoes')->insert(['id' => 13,'descricao' => 'Complicação neurológica']);
    }
}
