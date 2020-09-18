<?php

use Illuminate\Database\Seeder;

class DoencasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // tipo_doenca_id = 1
        DB::table('doencas')->insert(['id' => 1,'tipo_doenca_id' => 1,'descricao' => 'Doença arterial coronariana']);
        DB::table('doencas')->insert(['id' => 2,'tipo_doenca_id' => 1,'descricao' => 'Insuficiência cardíaca congestiva']);
        DB::table('doencas')->insert(['id' => 3,'tipo_doenca_id' => 1,'descricao' => 'Arritmia cardíaca']);
        DB::table('doencas')->insert(['id' => 4,'tipo_doenca_id' => 1,'descricao' => 'Cardiopatia não-especificada']);
        DB::table('doencas')->insert(['id' => 5,'tipo_doenca_id' => 1,'descricao' => 'Valvopatia cardíaca']);
        DB::table('doencas')->insert(['id' => 6,'tipo_doenca_id' => 1,'descricao' => 'Outras']);

        // tipo_doenca_id = 2

        DB::table('doencas')->insert(['id' => 7,'tipo_doenca_id' => 2,'descricao' => 'Insuficiência venosa crônica']);
        DB::table('doencas')->insert(['id' => 8,'tipo_doenca_id' => 2,'descricao' => 'Doença arterial periférica']);
        DB::table('doencas')->insert(['id' => 9,'tipo_doenca_id' => 2,'descricao' => 'Outras']);

        // tipo_doenca_id = 3
        DB::table('doencas')->insert(['id' => 10,'tipo_doenca_id' => 3,'descricao' => 'Doença pulmonar obstrutiva crônica']);
        DB::table('doencas')->insert(['id' => 11,'tipo_doenca_id' => 3,'descricao' => 'Asma']);
        DB::table('doencas')->insert(['id' => 12,'tipo_doenca_id' => 3,'descricao' => 'Enfisema pulmonar']);
        DB::table('doencas')->insert(['id' => 13,'tipo_doenca_id' => 3,'descricao' => 'Bronquite crônica ']);
        DB::table('doencas')->insert(['id' => 14,'tipo_doenca_id' => 3,'descricao' => 'Outras']);

        // tipo_doenca_id = 4
        DB::table('doencas')->insert(['id' => 15,'tipo_doenca_id' => 4,'descricao' => 'Artrite Reumatóide']);
        DB::table('doencas')->insert(['id' => 16,'tipo_doenca_id' => 4,'descricao' => 'Gota']);
        DB::table('doencas')->insert(['id' => 17,'tipo_doenca_id' => 4,'descricao' => 'Artrite não especificada']);
        DB::table('doencas')->insert(['id' => 18,'tipo_doenca_id' => 4,'descricao' => 'Artrite / osteoartrose']);
        DB::table('doencas')->insert(['id' => 19,'tipo_doenca_id' => 4,'descricao' => 'Doença da coluna vertebral']);
        DB::table('doencas')->insert(['id' => 20,'tipo_doenca_id' => 4,'descricao' => 'Lúpus Eritematoso Sistêmico']);
        DB::table('doencas')->insert(['id' => 21,'tipo_doenca_id' => 4,'descricao' => 'Fibromialgia']);
        DB::table('doencas')->insert(['id' => 22,'tipo_doenca_id' => 4,'descricao' => 'Outras']);

        // tipo_doenca_id = 5
        DB::table('doencas')->insert(['id' => 23,'tipo_doenca_id' => 5,'descricao' => 'Cancêr de órgão sólido']);
        DB::table('doencas')->insert(['id' => 24,'tipo_doenca_id' => 5,'descricao' => 'Cancêr hematológico']);
        DB::table('doencas')->insert(['id' => 25,'tipo_doenca_id' => 5,'descricao' => 'Outras']);

        // tipo_doenca_id = 6
        DB::table('doencas')->insert(['id' => 26,'tipo_doenca_id' => 6,'descricao' => 'Insuficiência renal crônica não dialítica']);
        DB::table('doencas')->insert(['id' => 27,'tipo_doenca_id' => 6,'descricao' => 'Insuficiência renal crônica dialítica']);
        DB::table('doencas')->insert(['id' => 28,'tipo_doenca_id' => 6,'descricao' => 'Nefrolitíase']);
        DB::table('doencas')->insert(['id' => 29,'tipo_doenca_id' => 6,'descricao' => 'Outras']);

        // tipo_doenca_id = 7
        DB::table('doencas')->insert(['id' => 30,'tipo_doenca_id' => 7,'descricao' => 'Hepatite C']);
        DB::table('doencas')->insert(['id' => 31,'tipo_doenca_id' => 7,'descricao' => 'Hepatite B']);
        DB::table('doencas')->insert(['id' => 32,'tipo_doenca_id' => 7,'descricao' => 'Cirrose Hepática']);
        DB::table('doencas')->insert(['id' => 33,'tipo_doenca_id' => 7,'descricao' => 'Hepatopatia não especificada']);
        DB::table('doencas')->insert(['id' => 34,'tipo_doenca_id' => 7,'descricao' => 'Outras']);

        // tipo_doenca_id = 8
        DB::table('doencas')->insert(['id' => 35,'tipo_doenca_id' => 8,'descricao' => 'Alzheimer']);
        DB::table('doencas')->insert(['id' => 36,'tipo_doenca_id' => 8,'descricao' => 'Acidente vascular cerebral']);
        DB::table('doencas')->insert(['id' => 37,'tipo_doenca_id' => 8,'descricao' => 'Epilepsia']);
        DB::table('doencas')->insert(['id' => 38,'tipo_doenca_id' => 8,'descricao' => 'Transtorno de espectro autista']);
        DB::table('doencas')->insert(['id' => 39,'tipo_doenca_id' => 8,'descricao' => 'Convulsão não especificada']);
        DB::table('doencas')->insert(['id' => 40,'tipo_doenca_id' => 8,'descricao' => 'Demência não especificada']);
        DB::table('doencas')->insert(['id' => 41,'tipo_doenca_id' => 8,'descricao' => 'Retardo mental']);
        DB::table('doencas')->insert(['id' => 42,'tipo_doenca_id' => 8,'descricao' => 'Doença de Parkinson']);
        DB::table('doencas')->insert(['id' => 43,'tipo_doenca_id' => 8,'descricao' => 'Outras']);

        // tipo_doenca_id = 9
        DB::table('doencas')->insert(['id' => 44,'tipo_doenca_id' => 9,'descricao' => 'Hipotiroidismo']);
        DB::table('doencas')->insert(['id' => 45,'tipo_doenca_id' => 9,'descricao' => 'Hipertiroidismo']);
        DB::table('doencas')->insert(['id' => 46,'tipo_doenca_id' => 9,'descricao' => 'Outras']);

        // tipo_doenca_id = 10
        DB::table('doencas')->insert(['id' => 47,'tipo_doenca_id' => 10,'descricao' => 'Esquizofrenia']);
        DB::table('doencas')->insert(['id' => 48,'tipo_doenca_id' => 10,'descricao' => 'Depressão']);
        DB::table('doencas')->insert(['id' => 49,'tipo_doenca_id' => 10,'descricao' => 'Transtorno de ansiedade']);
        DB::table('doencas')->insert(['id' => 50,'tipo_doenca_id' => 10,'descricao' => 'Outras']);
    }
}
