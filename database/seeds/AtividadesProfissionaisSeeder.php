<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
