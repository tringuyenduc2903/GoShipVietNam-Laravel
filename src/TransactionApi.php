<?php

namespace BeetechAsia\GoShip;

use Illuminate\Http\Client\ConnectionException;

trait TransactionApi
{
    /**
     * @throws ConnectionException
     */
    public function getTransactions(?int $perPage = null, string $pageName = 'page', ?int $page = null): array
    {
        $query = $this->getPaginateQuery($perPage, $pageName, $page);

        return $this->getRequest()->get('api/v2/transactions', $query)->json('data');
    }
}
