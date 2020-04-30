<?php

namespace App\Repositories;

use App\Models\Deal;
use App\Repositories\BaseRepository;

/**
 * Class DealRepository
 * @package App\Repositories
 * @version April 30, 2020, 1:55 pm UTC
*/

class DealRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Deal::class;
    }
}
