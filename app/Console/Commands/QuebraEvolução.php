<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\InclusaoDesmame;
use App\Models\Pronacao;
use App\Models\SuporteRespiratorio;

class QuebraEvolução extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:divideSuporte';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Divide periodo dos suportes respiratórios em várias por dia';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $allSuporte = SuporteRespiratorio::all();
        foreach ($allSuporte as $suporte) {
            if ($suporte->data_termino != null) {
                $periodDays = date_diff(date_create($suporte->data_inicio), date_create($suporte->data_termino));
                for ($i=0; $i <= $periodDays->d; $i++) {
                    $date = date_create($suporte->data_inicio);
                    SuporteRespiratorio::create([
                        'paciente_id' => $suporte->paciente_id,
                        'tipo_suporte_id' => $suporte->tipo_suporte_id,
                        'fluxo_o2' => $suporte->fluxo_o2,
                        'data_inicio' => date_add($date, date_interval_create_from_date_string($i ." days"))->format("Y-m-d"),
                        'data_termino' => null,
                        'menos_24h_vmi' => $suporte->menos_24h_vmi,
                        'concentracao_o2' => $suporte->concentracao_o2,
                        'fluxo_sangue' => $suporte->fluxo_sangue,
                        'fluxo_gasoso' => $suporte->fluxo_gasoso,
                        'fio2' => $suporte->fio2
                    ]);
                }
                $suporte->delete();
            }
        }
    }
}
