<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CoresSeeder::class,
            EstadoCivisSeeder::class,
            EstadosSeeder::class,
            MunicipiosSeeder::class,
            BairrosSeeder::class,
            InstituicoesSeeder::class,
            TiposSuporteRespiratorio::class,
            SituacaoUsoDrogasSeeder::class,
            DrogasSeeder::class
        ]);

    }
}
