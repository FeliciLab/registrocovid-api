<?php

use Illuminate\Database\Seeder;

class TipoIRASSeedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_iras')->insert(['id' => 1,'descricao' => 'Pneumonia associada à ventilação mecânica (PAV)']);
        DB::table('tipo_iras')->insert(['id' => 2,'descricao' => 'Pneumonia não associada à ventilação mecânica']);
        DB::table('tipo_iras')->insert(['id' => 3,'descricao' => 'Infecção de corrente sanguínea relacionada a cateter central (ICSRC)']);
        DB::table('tipo_iras')->insert(['id' => 4,'descricao' => 'Infecção de trato urinário associada à sonda vesical (ITUSV)']);
        DB::table('tipo_iras')->insert(['id' => 5,'descricao' => 'Outras']);
    }
}