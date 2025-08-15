<?php

namespace BeetechAsia\GoShip;

use BeetechAsia\GoShip\Enums\Payer;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

trait ShipmentApi
{
    /**
     * @throws ConnectionException
     */
    public function getShipments(?int $perPage = null, string $pageName = 'page', ?int $page = null): array
    {
        $query = $this->getPaginateQuery($perPage, $pageName, $page);

        return $this->getRequest()->get('api/v2/shipments', $query)->json('data');
    }

    /**
     * @throws ConnectionException
     */
    public function createShipment(array $data): bool
    {
        Validator::validate($data, [
            'shipment' => ['required'],
            'shipment.rate' => ['required', 'string'],
            'shipment.payer' => ['required', 'integer', Rule::in(Payer::getValues())],
            'shipment.order_id' => ['required', 'string'],
            'shipment.address_from' => ['required'],
            'shipment.address_from.name' => ['required', 'string', 'max:255'],
            'shipment.address_from.phone' => ['required', 'string', 'max:255'],
            'shipment.address_from.street' => ['required', 'string', 'max:255'],
            'shipment.address_from.ward' => ['required', 'integer'],
            'shipment.address_from.district' => ['required', 'integer'],
            'shipment.address_from.city' => ['required', 'integer'],
            'shipment.address_to' => ['required'],
            'shipment.address_to.name' => ['required', 'string', 'max:255'],
            'shipment.address_to.phone' => ['required', 'string', 'max:255'],
            'shipment.address_to.street' => ['required', 'string', 'max:255'],
            'shipment.address_to.ward' => ['required', 'integer'],
            'shipment.address_to.district' => ['required', 'integer'],
            'shipment.address_to.city' => ['required', 'integer'],
            'shipment.parcel.cod' => ['nullable', 'integer'],
            'shipment.parcel.amount' => ['nullable', 'integer'],
            'shipment.parcel.width' => ['required', 'integer'],
            'shipment.parcel.height' => ['required', 'integer'],
            'shipment.parcel.length' => ['required', 'integer'],
            'shipment.parcel.weight' => ['required', 'integer'],
            'shipment.parcel.metadata' => ['nullable', 'string'],
        ]);

        $status = $this->getRequest()->post('api/v2/shipments', $data)->json('status');

        return $status === 'success';
    }

    /**
     * @throws ConnectionException
     */
    public function deleteShipment(string $shipmentId): bool
    {
        $status = $this->getRequest()->delete("api/v2/shipments/$shipmentId")->json('status');

        return $status === 'success';
    }
}
