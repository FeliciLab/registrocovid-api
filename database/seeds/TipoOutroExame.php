<?php

use Illuminate\Database\Seeder;

class TipoOutroExame extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_outro_exame')->insert(['id' => 1,'descricao' => 'Tomografia computadorizada de tórax']);
        DB::table('tipo_outro_exame')->insert(['id' => 2,'descricao' => 'Eletrocardiograma']);
    }
}
