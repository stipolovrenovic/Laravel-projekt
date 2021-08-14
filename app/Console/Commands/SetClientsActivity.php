<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Client;

class SetClientsActivity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clients:active {activeBool}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Changes all clients\' "active" column to the inserted value.';

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
        $clients = Client::all();

        foreach($clients as $client)
        {
            $client->active = $this->argument('activeBool');
            $client->save();
        } 
    }
}
