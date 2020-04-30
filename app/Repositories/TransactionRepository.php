<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\BaseRepository;
use App\Repositories\ClientRepository;
use App\Repositories\DealRepository;

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

    protected $clientRepository;
    protected $dealRepository;

    /**
     * Construct method to inject Client and Deals repositories
     *
     * @param ClientRepository $clientRepo
     * @param DealRepository $dealRepo
     */
    public function __construct(ClientRepository $clientRepo, DealRepository $dealRepo)
    {
        $this->clientRepository = $clientRepo;
        $this->dealRepository = $dealRepo;
    }

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
        $client = $this->clientRepository->firstOrCreate(
            [
                'id' => 2,
                'name' => 'Fernando',
            ]
        );

        $deal = $this->dealRepository->firstOrCreate(
            [
                'id' => 2,
                'name' => 'Fernando\'s Deal',
            ]
        );

        dump($client);
        dump($deal);
        
    }
}
