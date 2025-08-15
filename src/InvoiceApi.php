<?php

namespace BeetechAsia\GoShip;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Validator;

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

    /**
     * @throws ConnectionException
     */
    public function searchInvoice(?string $code = null, ?string $from = null, ?string $to = null, ?int $perPage = null, string $pageName = 'page', ?int $page = null): array
    {
        $search = Validator::validate(compact('code', 'from', 'to'), [
            'code' => ['nullable', 'string'],
            'from' => ['nullable', 'required_without:code', 'string', 'date_format:Y-m-d', 'before:to'],
            'to' => ['nullable', 'required_without:code', 'string', 'date_format:Y-m-d'],
        ]);

        $query = array_merge(
            $search,
            $this->getPaginateQuery($perPage, $pageName, $page)
        );

        return $this->getRequest()->get('api/v2/invoices', $query)->json('data');
    }

    /**
     * @throws ConnectionException
     */
    public function getShipmentByInvoiceId(string $invoiceId, ?int $perPage = null, string $pageName = 'page', ?int $page = null): array
    {
        $query = $this->getPaginateQuery($perPage, $pageName, $page);

        return $this->getRequest()->get("api/v2/invoices/$invoiceId/shipments", $query)->json('data');
    }
}
