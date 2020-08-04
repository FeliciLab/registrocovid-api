<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AtividadesProfissionaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('atividadesprofissionais')->insert([
            'id'   => 1,
            'nome' => 'Futebol',
        ]);
    }
}
