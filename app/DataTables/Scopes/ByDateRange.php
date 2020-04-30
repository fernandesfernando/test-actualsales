<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class ByDateRange implements DataTableScope
{
    private $startDate;
    private $finalDate;

    /**
     * @param $empresaID
     */
    public function __construct($startDate, $finalDate)
    {
        $this->startDate = $startDate;
        $this->finalDate = $finalDate;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        
        $startDate = $this->startDate;
        $finalDate = $this->finalDate;

        switch ([$startDate, $finalDate]) {
            case [true, true]:
                return $query->whereBetween('hour', [\Carbon\Carbon::parse($this->startDate), \Carbon\Carbon::parse($this->finalDate)]);
                break;
            
            case [true, null]:
                return $query->where('hour', '>=', \Carbon\Carbon::parse($this->startDate));    
                break;
            
            case [null, true]:
                return $query->where('hour', '<=', \Carbon\Carbon::parse($this->finalDate));    
                break;

            default:                
                break;
        }

    }
}
