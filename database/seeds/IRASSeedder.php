<?php

use Illuminate\Database\Seeder;

class IRASSeedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_iras')->insert(['id' => 1,'descricao' => 'Pneumonia associada à ventilação (PAV)']);
        DB::table('tipo_iras')->insert(['id' => 2,'descricao' => 'Pneumonia associada não à ventilação (PAV)']);
        DB::table('tipo_iras')->insert(['id' => 3,'descricao' => 'Infecção de corrente sanguínea relacionada a catéter']);
        DB::table('tipo_iras')->insert(['id' => 4,'descricao' => 'Infecção de trato urinário associada à sonda vesical']);
        DB::table('tipo_iras')->insert(['id' => 5,'descricao' => 'Outras']);
    }
}