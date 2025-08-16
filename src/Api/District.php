<?php

namespace BeetechAsia\GoShip\Api;

use Illuminate\Http\Client\ConnectionException;

trait District
{
    /**
     * @throws ConnectionException
     */
    public function getDistricts(?int $perPage = null, string $pageName = 'page', ?int $page = null): array
    {
        $query = $this->getPaginateQuery($perPage, $pageName, $page);

        return $this->getRequest()->get('api/v2/districts', $query)->json('data');
    }

    /**
     * @throws ConnectionException
     */
    public function getWardsByDistrictId(int $districtId): array
    {
        return $this->getRequest()->get("api/v2/districts/$districtId/wards")->json('data');
    }
}
