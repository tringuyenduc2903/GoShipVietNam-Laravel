<?php

namespace BeetechAsia\GoShip;

use Illuminate\Http\Client\ConnectionException;

trait AddressApi
{
    /**
     * @throws ConnectionException
     */
    public function getProvinces(): array
    {
        return $this->getRequest()->get('api/v2/cities')->json();
    }

    /**
     * @throws ConnectionException
     */
    public function getDistrictsByProvinceId(int $provinceId): array
    {
        return $this->getRequest()->get("api/v2/cities/$provinceId/districts")->json();
    }

    /**
     * @throws ConnectionException
     */
    public function getDistricts(?int $perPage = null, string $pageName = 'page', ?int $page = null): array
    {
        $query = [];

        if ($perPage) {
            $query['size'] = $perPage;
        }

        if (is_null($page)) {
            $page = request($pageName, 1);
        }

        $query['page'] = $page;

        return $this->getRequest()->get('api/v2/districts', $query)->json();
    }

    public function getWardsByDistrictId(int $districtId): array
    {
        return $this->getRequest()->get("api/v2/districts/$districtId/wards")->json();
    }
}
