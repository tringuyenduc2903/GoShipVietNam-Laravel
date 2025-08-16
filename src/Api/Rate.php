<?php

namespace BeetechAsia\GoShip\Api;

use BeetechAsia\GoShip\Enums\Kind;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

trait Rate
{
    /**
     * @throws ConnectionException
     */
    public function getRates(array $data): array
    {
        Validator::validate($data, [
            'shipment' => ['required', 'array'],
            'shipment.address_from' => ['required', 'array'],
            'shipment.address_from.district' => ['required', 'integer'],
            'shipment.address_from.city' => ['required', 'integer'],
            'shipment.address_to' => ['required', 'array'],
            'shipment.address_to.district' => ['required', 'integer'],
            'shipment.address_to.city' => ['required', 'integer'],
            'shipment.parcel' => ['required', 'array'],
            'shipment.parcel.cod' => ['nullable', 'integer'],
            'shipment.parcel.amount' => ['nullable', 'integer'],
            'shipment.parcel.width' => ['required', 'integer'],
            'shipment.parcel.height' => ['required', 'integer'],
            'shipment.parcel.length' => ['required', 'integer'],
            'shipment.parcel.weight' => ['required', 'integer'],
        ]);

        return $this->getRequest()->post('api/v2/rates', $data)->json('data');
    }

    /**
     * @throws ConnectionException
     */
    public function getOnDemandRates(array $data): array
    {
        Validator::validate($data, [
            'paths' => ['required', 'array', 'size:2'],
            'paths.*.lat' => ['required', 'numeric', 'min:-90', 'max:90'],
            'paths.*.lng' => ['required', 'numeric', 'min:-180', 'max:189'],
            'paths.*.kind' => ['required', 'integer', Rule::in(Kind::getValues())],
            'paths.*.parcel' => ['nullable', 'required_if:paths.*.kind,'.Kind::DELIVERY, 'array'],
            'paths.*.parcel.name' => ['nullable', 'required_if:paths.*.kind,'.Kind::DELIVERY, 'string', 'max:255'],
            'paths.*.parcel.quantity' => ['nullable', 'integer'],
            'paths.*.parcel.cod_amount' => ['nullable', 'integer'],
            'paths.*.parcel.amount' => ['nullable', 'integer'],
            'paths.*.parcel.width' => ['nullable', 'integer'],
            'paths.*.parcel.height' => ['nullable', 'integer'],
            'paths.*.parcel.length' => ['nullable', 'integer'],
            'paths.*.parcel.weight' => ['nullable', 'required_if:paths.*.kind,'.Kind::DELIVERY, 'integer'],
            'paths.*.services' => ['nullable', 'array'],
            'paths.*.services.*._id' => ['required', 'string'],
            'paths.*.services.*.num' => ['required', 'integer'],
            'paths.*.services.*.tier_code' => ['required', 'string'],
        ]);

        return $this->getRequest()->post('api/v2/ondemand-shipments/rates', $data)->json('data');
    }
}
