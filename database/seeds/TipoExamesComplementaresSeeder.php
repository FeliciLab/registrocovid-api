<?php

use Illuminate\Database\Seeder;

class TipoExamesComplementaresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_exames_complementares')->insert(['id' => 1,'descricao' => 'Tomografia computadorizada de tórax']);
        DB::table('tipo_exames_complementares')->insert(['id' => 2,'descricao' => 'Eletrocardiograma']);
    }
}
