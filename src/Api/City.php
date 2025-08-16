<?php

namespace BeetechAsia\GoShip\Api;

use Illuminate\Http\Client\ConnectionException;

trait City
{
    /**
     * @throws ConnectionException
     */
    public function getCities(): array
    {
        return $this->getRequest()->get('api/v2/cities')->json('data');
    }

    /**
     * @throws ConnectionException
     */
    public function getDistrictsByCityId(int $cityId): array
    {
        return $this->getRequest()->get("api/v2/cities/$cityId/districts")->json('data');
    }
}
