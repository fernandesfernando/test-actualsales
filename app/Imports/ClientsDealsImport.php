<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\Deal;
use App\Models\Transaction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ClientsDealsImport implements ToCollection
{
    
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        
        foreach ($rows as $row) {
            dump('linha ', $row);
        }
        
        $client = Client::firstOrCreate(
            [
                'id' => 2,
                'name' => 'Fernando',
            ]
        );

        $deal = Deal::firstOrCreate(
            [
                'id' => 2,
                'name' => 'Fernando\'s Deal',
            ]
        );

        $transaction = Transaction::create([
            'client_id' => $client->id,
            'deal_id' => $deal->id,
            'accepted' => 2,
            'refused' => 3,
            'hour' => \Carbon\Carbon::now()
        ]);

    }
}
