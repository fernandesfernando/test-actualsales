<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\Deal;
use App\Models\Transaction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsDealsImport implements ToCollection, WithHeadingRow
{
    
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        
        foreach ($rows as $row) {
            
            $clientArrayFromCSV = explode(' @', $row['client']);
            $dealArrayFromCSV = explode(' #', $row['deal']);
            
            $clientName = $clientArrayFromCSV[0];
            $clientId = (int) $clientArrayFromCSV[1];
            
            $dealName = $dealArrayFromCSV[0];
            $dealId = (int) $dealArrayFromCSV[1];

            $hour = \Carbon\Carbon::parse($row['hour']);
            $accepted = $row['accepted'];
            $refused = $row['refused'];
            
            
            $client = Client::firstOrCreate(
                [
                    'imported_id' => $clientId,
                    'name' => $clientName,
                ]
            );

            $deal = Deal::firstOrCreate(
                [
                    'imported_id' => $dealId,
                    'name' => $dealName,
                ]
            );

            $transaction = Transaction::firstOrCreate([
                'client_id' => $client->id,
                'deal_id' => $deal->id,
                'accepted' => $accepted,
                'refused' => $refused,
                'hour' => $hour
            ]);
        }

    }
}
