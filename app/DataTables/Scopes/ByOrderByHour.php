<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class ByOrderByHour implements DataTableScope
{
    
    private $orderByRawString;
    

    /**
     * @param $empresaID
     */
    public function __construct($orderByRawString)
    {
        $this->orderByRawString = $orderByRawString;
    }
    
    
    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        $orderByRawString = $this->orderByRawString;
        if ($orderByRawString !== '') {
            return $query->orderByRaw($orderByRawString);
        }
    }
}
