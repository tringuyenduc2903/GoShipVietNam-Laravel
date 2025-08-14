<?php

namespace BeetechAsia\GoShip;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Validator;

trait CustomerApi
{
    /**
     * @throws ConnectionException
     */
    public function createCustomer(array $data): array
    {
        Validator::validate($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email:rfc,dns'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required'],
            'address.street' => ['required', 'string', 'max:255'],
            'address.district' => ['required', 'integer'],
            'address.city' => ['required', 'integer'],
        ]);

        return $this->getRequest()->post('api/v2/customers', $data)->json();
    }
}
