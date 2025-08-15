<?php

namespace BeetechAsia\GoShip;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Validator;

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

    /**
     * @throws ConnectionException
     */
    public function searchTransaction(?string $code = null, ?string $from = null, ?string $to = null, ?int $perPage = null, string $pageName = 'page', ?int $page = null): array
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

        return $this->getRequest()->get('api/v2/transactions', $query)->json('data');
    }
}
