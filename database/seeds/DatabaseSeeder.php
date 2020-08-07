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
            RtPcrResultadoSeeder::class,
            SitioTipoSeeder::class,
            CoresSeeder::class,
            EstadoCivisSeeder::class,
            EstadosSeeder::class,
            MunicipiosSeeder::class,
            BairrosSeeder::class,
            InstituicoesSeeder::class,
            TiposSuporteRespiratorio::class,
            SituacaoUsoDrogasSeeder::class,
            DrogasSeeder::class,
            EscolaridadesSeeder::class,
            AtividadesProfissionaisSeeder::class,
            TiposDoencaSeeder::class,
            DoencasSeeder::class,
            OrgaosSeeder::class,
<<<<<<< HEAD
            CorticosteroidesSeeder::class,
            SintomasSeeder::class,
=======
            CorticosteroideSeeder::class
>>>>>>> 9f54f1615be81ffdb87d93e6d00a4b2d75a95f49
        ]);

    }
}
