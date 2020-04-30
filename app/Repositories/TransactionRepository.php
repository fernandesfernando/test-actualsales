<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\BaseRepository;

/**
 * Class TransactionRepository
 * @package App\Repositories
 * @version April 30, 2020, 2:02 pm UTC
*/

class TransactionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'hour',
        'deal_id',
        'client_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Transaction::class;
    }

    /**
     * Method to import a CSV e insert Clients, Deals and Transaction entities
     *
     * @return void
     */
    public function importCSV($filePath)
    {
        dump($filePath);
    }
}
