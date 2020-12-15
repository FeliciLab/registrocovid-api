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
            CorticosteroidesSeeder::class,
            SintomasSeeder::class,
            TiposComplicacoesSeeder::class,
            TipoExamesComplementaresSeeder::class,
            TipoComplicacaoVMSeeder::class,
            TipoTransfusaoSeeder::class,
            TipoIRASSeedder::class,
            TipoAutoCuidadoSeeder::class,
            TipoCuidadoPaliativoSeeder::class,
            TipoDesfechoSeeder::class,
            SituacaoTabagismoSeeder::class,
            SituacaoEtilismoSeeder::class
        ]);
    }
}
