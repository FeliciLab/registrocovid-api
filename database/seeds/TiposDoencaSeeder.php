<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposDoencaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_doencas')->insert(['id' => 1,'descricao' => 'Doença cardíaca']);
        DB::table('tipos_doencas')->insert(['id' => 2,'descricao' => 'Doença vascular periférica']);
        DB::table('tipos_doencas')->insert(['id' => 3,'descricao' => 'Doença pulmonar']);
        DB::table('tipos_doencas')->insert(['id' => 4,'descricao' => 'Doença reumatológica']);
        DB::table('tipos_doencas')->insert(['id' => 5,'descricao' => 'Neoplasia']);
        DB::table('tipos_doencas')->insert(['id' => 6,'descricao' => 'Doença autoimune']);
        DB::table('tipos_doencas')->insert(['id' => 7,'descricao' => 'Doença renal crônica']);
        DB::table('tipos_doencas')->insert(['id' => 8,'descricao' => 'Doença hepática crônica']);
        DB::table('tipos_doencas')->insert(['id' => 9,'descricao' => 'Doença neurológica']);
        DB::table('tipos_doencas')->insert(['id' => 10,'descricao' => 'Doença psiquiátrica']);
    }
}
