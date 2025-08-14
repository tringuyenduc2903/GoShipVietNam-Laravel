<?php

namespace BeetechAsia\GoShip;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class GoShip
{
    /**
     * @throws ConnectionException
     */
    public function getProvinces(): array
    {
        return $this->getRequest()->get('api/v2/cities')->json();
    }

    public function getRequest(): PendingRequest
    {
        return Http::baseUrl($this->getUrl())->withToken($this->getJwt());
    }

    public function getUrl(): string
    {
        return config('goshipvietnam.url');
    }

    public function getJwt(): string
    {
        return config('goshipvietnam.jwt');
    }
}
