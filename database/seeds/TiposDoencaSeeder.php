<?php

use Illuminate\Database\Seeder;

class TiposDoencaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_doenca')->insert(['id' => 1,'descricao' => 'Doença cardíaca']);
        DB::table('tipos_doenca')->insert(['id' => 2,'descricao' => 'Doença vascular periférica']);
        DB::table('tipos_doenca')->insert(['id' => 3,'descricao' => 'Doença pulmonar']);
        DB::table('tipos_doenca')->insert(['id' => 4,'descricao' => 'Doença reumatológica']);
        DB::table('tipos_doenca')->insert(['id' => 5,'descricao' => 'Neoplasia']);
        DB::table('tipos_doenca')->insert(['id' => 6,'descricao' => 'Doença autoimune']);
        DB::table('tipos_doenca')->insert(['id' => 7,'descricao' => 'Doença renal crônica']);
        DB::table('tipos_doenca')->insert(['id' => 8,'descricao' => 'Doença hepática crônica']);
        DB::table('tipos_doenca')->insert(['id' => 9,'descricao' => 'Doença neurológica']);
    }
}
