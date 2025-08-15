<?php

namespace BeetechAsia\GoShip;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Validator;

trait RateApi
{
    /**
     * @throws ConnectionException
     */
    public function getRates(array $data): array
    {
        Validator::validate($data, [
            'shipment' => ['required'],
            'shipment.address_from' => ['required'],
            'shipment.address_from.district' => ['required', 'integer'],
            'shipment.address_from.city' => ['required', 'integer'],
            'shipment.address_to' => ['required'],
            'shipment.address_to.district' => ['required', 'integer'],
            'shipment.address_to.city' => ['required', 'integer'],
            'shipment.parcel' => ['required'],
            'shipment.parcel.cod' => ['nullable', 'integer'],
            'shipment.parcel.amount' => ['nullable', 'integer'],
            'shipment.parcel.width' => ['required', 'integer'],
            'shipment.parcel.height' => ['required', 'integer'],
            'shipment.parcel.length' => ['required', 'integer'],
            'shipment.parcel.weight' => ['required', 'integer'],
        ]);

        return $this->getRequest()->post('api/v2/rates', $data)->json('data');
    }
}
