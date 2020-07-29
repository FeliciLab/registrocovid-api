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
        DB::table('unidade_federativa')->insert([
            'id'   => 1,
            'nome' => 'Rondônia',
            'sigla' => 'RO',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 2,
            'nome' => 'Acre',
            'sigla' => 'AC',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 3,
            'nome' => 'Amazonas',
            'sigla' => 'AM',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 4,
            'nome' => 'Roraima',
            'sigla' => 'RR',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 5,
            'nome' => 'Pará',
            'sigla' => 'PA',
        ]);
        
        DB::table('unidade_federativa')->insert([
            'id'   => 6,
            'nome' => 'Amapá',
            'sigla' => 'AP',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 7,
            'nome' => 'Tocantins',
            'sigla' => 'TO',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 8,
            'nome' => 'Maranhão',
            'sigla' => 'MA',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 9,
            'nome' => 'Piauí',
            'sigla' => 'PI',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 10,
            'nome' => 'Ceará',
            'sigla' => 'CE',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 11,
            'nome' => 'Rio Grande do Norte',
            'sigla' => 'RN',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 12,
            'nome' => 'Paraíba',
            'sigla' => 'PB',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 13,
            'nome' => 'Pernambuco',
            'sigla' => 'PE',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 14,
            'nome' => 'Alagoas',
            'sigla' => 'AL',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 15,
            'nome' => 'Sergipe',
            'sigla' => 'SE',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 16,
            'nome' => 'Bahia',
            'sigla' => 'BA',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 17,
            'nome' => 'Minas Gerais',
            'sigla' => 'MG',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 18,
            'nome' => 'Espírito Santo',
            'sigla' => 'ES',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 19,
            'nome' => 'Rio de Janeiro',
            'sigla' => 'RJ',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 20,
            'nome' => 'São Paulo',
            'sigla' => 'SP',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 22,
            'nome' => 'Paraná',
            'sigla' => 'PR',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 23,
            'nome' => 'Santa Catarina',
            'sigla' => 'SC',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 24,
            'nome' => 'Rio Grande do Sul',
            'sigla' => 'RS',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 25,
            'nome' => 'Mato Grosso do Sul',
            'sigla' => 'MS',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 26,
            'nome' => 'Mato Grosso',
            'sigla' => 'MT',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 27,
            'nome' => 'Goiás',
            'sigla' => 'GO',
        ]);

        DB::table('unidade_federativa')->insert([
            'id'   => 28,
            'nome' => 'Distrito Federal',
            'sigla' => 'DF',
        ]);
    }
}
