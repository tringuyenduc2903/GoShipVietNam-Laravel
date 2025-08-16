<?php

namespace BeetechAsia\GoShip\Api;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

trait Authentication
{
    /**
     * @throws ConnectionException
     */
    public function login(array $data): array
    {
        Validator::validate($data, [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'client_id' => ['required', 'integer'],
            'client_secret' => ['required', 'string'],
        ]);

        $result = $this->getRequest()->post('api/v2/login', $data)->json();

        return Arr::only($result, ['access_token', 'refresh_token', 'expires_in']);
    }

    /**
     * @throws ConnectionException
     */
    public function refreshToken(array $data): null
    {
        Validator::validate($data, [
            'refresh_token' => ['required', 'string'],
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'client_id' => ['required', 'integer'],
            'client_secret' => ['required', 'string'],
        ]);

        return $this->getRequest()->post('api/v2/refresh_token', $data)->json();
    }
}
