<?php

namespace BeetechAsia\GoShip;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class GoShip
{
    use AddressApi;
    use CustomerApi;
    use InvoiceApi;
    use RateApi;
    use ShipmentApi;

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

    protected function getPaginateQuery(?int $perPage = null, string $pageName = 'page', ?int $page = null): array
    {
        if ($perPage) {
            $query['size'] = $perPage;
        }

        if (is_null($page)) {
            $page = request($pageName, 1);
        }

        $query['page'] = $page;

        return $query;
    }
}
