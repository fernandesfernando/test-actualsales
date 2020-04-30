<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class ByDealIdScope implements DataTableScope
{
    private $dealId;

    /**
     * @param $empresaID
     */
    public function __construct($dealId)
    {
        $this->dealId = $dealId;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        $dealId = $this->dealId;

        if ($dealId) {
            return $query->where('deal_id', $dealId);
        }
    }
}
