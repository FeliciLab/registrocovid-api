<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoCivisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados_civis')->insert([
            'id'   => 1,
            'nome' => 'Casado/ amasiado',
        ]);

        DB::table('estados_civis')->insert([
            'id'   => 2,
            'nome' => 'Separado / divorciado',
        ]);

        DB::table('estados_civis')->insert([
            'id'   => 3,
            'nome' => 'Solteiro',
        ]);

        DB::table('estados_civis')->insert([
            'id'   => 4,
            'nome' => 'Viúvo',
        ]);

        DB::table('estados_civis')->insert([
            'id'   => 5,
            'nome' => 'Não Informado',
        ]);
    }
}
