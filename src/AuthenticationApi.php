<?php

namespace BeetechAsia\GoShip;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

trait AuthenticationApi
{
    /**
     * @throws ConnectionException
     */
    public function login(array $data): array
    {
        Validator::validate($data, [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
            'client_id' => ['required', 'integer'],
            'client_secret' => ['required', 'string', 'max:255'],
        ]);

        $result = $this->getRequest()->post('api/v2/login', $data)->json();

        return Arr::only($result, ['access_token', 'refresh_token', 'expires_in']);
    }
}
