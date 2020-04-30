<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class ByClientIdScope implements DataTableScope
{
    private $clientId;

    /**
     * @param $empresaID
     */
    public function __construct($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        $clientId = $this->clientId;

        return $query->where('client_id', $clientId);
    }
}
