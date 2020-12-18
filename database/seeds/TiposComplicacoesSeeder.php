<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposComplicacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_complicacoes')->insert(['id' => 1,'descricao' => 'Admissão na Unidade de Terapia Intensiva (UTI)']);
        DB::table('tipos_complicacoes')->insert(['id' => 2,'descricao' => 'Síndrome Respiratória Aguda Grave (SRAG)']);
        DB::table('tipos_complicacoes')->insert(['id' => 3,'descricao' => 'Síndrome da Angústia Respiratória Aguda (SARA)']);
        DB::table('tipos_complicacoes')->insert(['id' => 4,'descricao' => 'Arritmia cardíaca']);
        DB::table('tipos_complicacoes')->insert(['id' => 5,'descricao' => 'Insuficiência renal aguda']);
        DB::table('tipos_complicacoes')->insert(['id' => 6,'descricao' => 'Disfunção hepática']);
        DB::table('tipos_complicacoes')->insert(['id' => 7,'descricao' => 'Sepse']);
        DB::table('tipos_complicacoes')->insert(['id' => 8,'descricao' => 'Choque séptico']);
        DB::table('tipos_complicacoes')->insert(['id' => 9,'descricao' => 'Choque hipovolêmico']);
        DB::table('tipos_complicacoes')->insert(['id' => 10,'descricao' => 'Disfunção múltipla de órgãos']);
        DB::table('tipos_complicacoes')->insert(['id' => 11,'descricao' => 'Trombose venosa profunda (TVP)']);
        DB::table('tipos_complicacoes')->insert(['id' => 12,'descricao' => 'Tromboembolismo pulmonar (TEP)']);
        DB::table('tipos_complicacoes')->insert(['id' => 13,'descricao' => 'Outros fenômenos tromboembólicos']);
        DB::table('tipos_complicacoes')->insert(['id' => 14,'descricao' => 'Complicação neurológica']);
        DB::table('tipos_complicacoes')->insert(['id' => 15,'descricao' => 'Outras']);
        DB::table('tipos_complicacoes')->insert(['id' => 16,'descricao' => 'Câncer']);
    }
}
