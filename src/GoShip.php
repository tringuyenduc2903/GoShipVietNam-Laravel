<?php

namespace BeetechAsia\GoShip;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class GoShip
{
    use AddressApi;
    use CustomerApi;

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
