<?php

namespace BeetechAsia\GoShip;

use Illuminate\Http\Client\ConnectionException;

trait InvoiceApi
{
    /**
     * @throws ConnectionException
     */
    public function getInvoices(?int $perPage = null, string $pageName = 'page', ?int $page = null): array
    {
        $query = $this->getPaginateQuery($perPage, $pageName, $page);

        return $this->getRequest()->get('api/v2/invoices', $query)->json('data');
    }
}
