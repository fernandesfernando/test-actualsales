<?php

namespace App\Console\Commands;

use App\Repositories\TransactionRepository;
use Illuminate\Console\Command;

class ImportClientsDealsCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:clientsdeals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to import a CSV containing Clients, Deals and Transaction informations';

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
     * @return mixed
     */
    public function handle(TransactionRepository $transactionRepository)
    {
        $transactionRepository->importCSV('filePath');
    }
}
