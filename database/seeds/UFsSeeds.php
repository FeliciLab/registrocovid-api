<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UFsSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ufs')->insert([
            'id'   => 1,
            'nome' => 'Rondônia',
            'sigla' => 'RO',
        ]);

        DB::table('ufs')->insert([
            'id'   => 2,
            'nome' => 'Acre',
            'sigla' => 'AC',
        ]);

        DB::table('ufs')->insert([
            'id'   => 3,
            'nome' => 'Amazonas',
            'sigla' => 'AM',
        ]);

        DB::table('ufs')->insert([
            'id'   => 4,
            'nome' => 'Roraima',
            'sigla' => 'RR',
        ]);

        DB::table('ufs')->insert([
            'id'   => 5,
            'nome' => 'Pará',
            'sigla' => 'PA',
        ]);
        
        DB::table('ufs')->insert([
            'id'   => 6,
            'nome' => 'Amapá',
            'sigla' => 'AP',
        ]);

        DB::table('ufs')->insert([
            'id'   => 7,
            'nome' => 'Tocantins',
            'sigla' => 'TO',
        ]);

        DB::table('ufs')->insert([
            'id'   => 8,
            'nome' => 'Maranhão',
            'sigla' => 'MA',
        ]);

        DB::table('ufs')->insert([
            'id'   => 9,
            'nome' => 'Piauí',
            'sigla' => 'PI',
        ]);

        DB::table('ufs')->insert([
            'id'   => 10,
            'nome' => 'Ceará',
            'sigla' => 'CE',
        ]);

        DB::table('ufs')->insert([
            'id'   => 11,
            'nome' => 'Rio Grande do Norte',
            'sigla' => 'RN',
        ]);

        DB::table('ufs')->insert([
            'id'   => 12,
            'nome' => 'Paraíba',
            'sigla' => 'PB',
        ]);

        DB::table('ufs')->insert([
            'id'   => 13,
            'nome' => 'Pernambuco',
            'sigla' => 'PE',
        ]);

        DB::table('ufs')->insert([
            'id'   => 14,
            'nome' => 'Alagoas',
            'sigla' => 'AL',
        ]);

        DB::table('ufs')->insert([
            'id'   => 15,
            'nome' => 'Sergipe',
            'sigla' => 'SE',
        ]);

        DB::table('ufs')->insert([
            'id'   => 16,
            'nome' => 'Bahia',
            'sigla' => 'BA',
        ]);

        DB::table('ufs')->insert([
            'id'   => 17,
            'nome' => 'Minas Gerais',
            'sigla' => 'MG',
        ]);

        DB::table('ufs')->insert([
            'id'   => 18,
            'nome' => 'Espírito Santo',
            'sigla' => 'ES',
        ]);

        DB::table('ufs')->insert([
            'id'   => 19,
            'nome' => 'Rio de Janeiro',
            'sigla' => 'RJ',
        ]);

        DB::table('ufs')->insert([
            'id'   => 20,
            'nome' => 'São Paulo',
            'sigla' => 'SP',
        ]);

        DB::table('ufs')->insert([
            'id'   => 22,
            'nome' => 'Paraná',
            'sigla' => 'PR',
        ]);

        DB::table('ufs')->insert([
            'id'   => 23,
            'nome' => 'Santa Catarina',
            'sigla' => 'SC',
        ]);

        DB::table('ufs')->insert([
            'id'   => 24,
            'nome' => 'Rio Grande do Sul',
            'sigla' => 'RS',
        ]);

        DB::table('ufs')->insert([
            'id'   => 25,
            'nome' => 'Mato Grosso do Sul',
            'sigla' => 'MS',
        ]);

        DB::table('ufs')->insert([
            'id'   => 26,
            'nome' => 'Mato Grosso',
            'sigla' => 'MT',
        ]);

        DB::table('ufs')->insert([
            'id'   => 27,
            'nome' => 'Goiás',
            'sigla' => 'GO',
        ]);

        DB::table('ufs')->insert([
            'id'   => 28,
            'nome' => 'Distrito Federal',
            'sigla' => 'DF',
        ]);
    }
}
