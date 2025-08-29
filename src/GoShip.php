<?php

namespace BeetechAsia\GoShip;

use BeetechAsia\GoShip\Api\Authentication;
use BeetechAsia\GoShip\Api\City;
use BeetechAsia\GoShip\Api\Customer;
use BeetechAsia\GoShip\Api\District;
use BeetechAsia\GoShip\Api\Invoice;
use BeetechAsia\GoShip\Api\Rate;
use BeetechAsia\GoShip\Api\Shipment;
use BeetechAsia\GoShip\Api\Transaction;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class GoShip
{
    use Authentication;
    use City;
    use Customer;
    use District;
    use Invoice;
    use Rate;
    use Shipment;
    use Transaction;

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

    public function verifyWebhook(?string $data = null, ?string $secret_key = null, ?string $webhook_hmac = null): bool
    {
        if (is_null($data)) {
            $data = request()->all();
        }

        if (is_null($secret_key)) {
            $secret_key = config('goshipvietnam.jwt');
        }

        if (is_null($webhook_hmac)) {
            $webhook_hmac = request()->header('x-goship-hmac-sha256');
        }

        $hashed = hash_hmac('sha256', $data, $secret_key, true);
        $compared_hmac = base64_encode($hashed);

        return hash_equals($compared_hmac, $webhook_hmac);
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
