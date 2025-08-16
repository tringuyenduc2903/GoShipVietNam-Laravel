<?php

namespace BeetechAsia\GoShip\Api;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Validator;

trait Customer
{
    /**
     * @throws ConnectionException
     */
    public function getCustomers(?int $perPage = null, string $pageName = 'page', ?int $page = null): array
    {
        $query = $this->getPaginateQuery($perPage, $pageName, $page);

        return $this->getRequest()->get('api/v2/customers', $query)->json('data');
    }

    /**
     * @throws ConnectionException
     */
    public function searchCustomer(string $q): array
    {
        return $this->getRequest()->get('api/v2/customers/search', compact('q'))->json('data');
    }

    /**
     * @throws ConnectionException
     */
    public function createCustomer(array $data): array
    {
        Validator::validate($data, [
            'name' => ['required', 'string'],
            'email' => ['nullable', 'string', 'email:rfc,dns'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'array'],
            'address.street' => ['required', 'string'],
            'address.district' => ['required', 'integer'],
            'address.city' => ['required', 'integer'],
        ]);

        return $this->getRequest()->post('api/v2/customers', $data)->json('data');
    }

    /**
     * @throws ConnectionException
     */
    public function updateCustomer(string $customerId, array $data): array
    {
        Validator::validate($data, [
            'name' => ['required', 'string'],
            'email' => ['nullable', 'string', 'email:rfc,dns'],
            'phone' => ['required', 'string'],
        ]);

        return $this->getRequest()->post("api/v2/customers/$customerId", $data)->json('data');
    }

    /**
     * @throws ConnectionException
     */
    public function deleteCustomer(string $customerId): bool
    {
        $status = $this->getRequest()->delete("api/v2/customers/$customerId")->json('status');

        return $status === 'success';
    }
}
