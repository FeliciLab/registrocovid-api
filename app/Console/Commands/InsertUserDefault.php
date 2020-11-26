<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class InsertUserDefault extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user 
                            {cpf : valor do cpf que será usado como login}
                            {--passwd=12345678 : a senha usada, padrão 12345678}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria um usuário com uma senha aleatória';

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
        (new User([
            'name' => Str::random(6),
            'cpf' => $this->argument('cpf'),
            'email' => Str::random(3) . '@' . Str::random(3) . '.' . Str::random(3),
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make($this->option('passwd')),
            'instituicao_id' => 1
        ]))->save();

        $this->info('Usuário');
        $this->info($this->argument('cpf'));
        $this->info('senha');
        $this->info($this->option('passwd'));
    }
}
