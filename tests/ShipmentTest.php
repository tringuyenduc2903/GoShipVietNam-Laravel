<?php

use BeetechAsia\GoShip\Enums\Payer;
use BeetechAsia\GoShip\Facades\GoShip;
use Illuminate\Http\Client\ConnectionException;
use Random\RandomException;

it(
    'createShipment must be bool',
    /**
     * @throws ConnectionException
     * @throws RandomException
     */
    function () {
        $shipment = GoShip::createShipment([
            'shipment' => [
                'rate' => 'MTFfMTdfMTU5Mw==',
                'payer' => Payer::getRandomValue(),
                'order_id' => Str::uuid()->toString(),
                'address_from' => [
                    'name' => fake()->name(),
                    'phone' => fake()->phoneNumber(),
                    'street' => fake()->streetAddress(),
                    'ward' => 64,
                    'district' => 100100,
                    'city' => 100000,
                ],
                'address_to' => [
                    'name' => fake()->name(),
                    'phone' => fake()->phoneNumber(),
                    'street' => fake()->streetAddress(),
                    'ward' => 63,
                    'district' => 100100,
                    'city' => 100000,
                ],
                'parcel' => [
                    'cod' => fake()->boolean() ? random_int(100_000, 200_000) : null,
                    'amount' => fake()->boolean() ? random_int(100_000, 200_000) : null,
                    'width' => random_int(10, 100),
                    'height' => random_int(10, 100),
                    'length' => random_int(10, 100),
                    'weight' => random_int(10, 100),
                    'metadata' => fake()->boolean() ? 'Hàng dễ vỡ, vui lòng nhẹ tay.' : null,
                ],
            ],
        ]);

        expect($shipment)
            ->dump()
            ->toBeBool();
    }
);

it(
    'deleteShipment must be bool',
    /**
     * @throws ConnectionException
     */
    function () {
        $shipment = GoShip::deleteShipment('GS6AYEDVZ6');

        expect($shipment)
            ->dump()
            ->toBeBool();
    }
);
