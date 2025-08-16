<?php

use BeetechAsia\GoShip\Enums\Kind;
use BeetechAsia\GoShip\Enums\OnDemandCarrier;
use BeetechAsia\GoShip\Enums\Payer;
use BeetechAsia\GoShip\Enums\Tier;
use BeetechAsia\GoShip\Facades\GoShip;
use Illuminate\Http\Client\ConnectionException;
use Random\RandomException;

it(
    'getShipments must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $shipments = GoShip::getShipments();

        expect($shipments)
            ->dump()
            ->toBeArray();
    }
);

it(
    'getOnDemandShipments must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $shipments = GoShip::getOnDemandShipments();

        expect($shipments)
            ->dump()
            ->toBeArray();
    }
);

it(
    'searchShipment must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $shipments = fake()->boolean()
            ? GoShip::searchShipment(fake()->randomElement(['GS8KOV152L', '96f794ff-261d-4ee3-98e0-c04cf1063549']))
            : GoShip::searchShipment(
                start_date: now()->subDays(7)->format('Y-m-d'),
                end_date: now()->format('Y-m-d')
            );

        expect($shipments)
            ->dump()
            ->toBeArray();
    }
);

it(
    'searchOnDemandShipment must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $shipments = fake()->boolean()
            ? GoShip::searchOnDemandShipment(fake()->randomElement(['GSNX8EXZLM', 'ed27e917-9ef2-4121-abe5-e277bea45cdd']))
            : GoShip::searchOnDemandShipment(
                start_date: now()->subDays(7)->format('Y-m-d'),
                end_date: now()->format('Y-m-d')
            );

        expect($shipments)
            ->dump()
            ->toBeArray();
    }
);

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
    'createOnDemandShipment must be array',
    /**
     * @throws ConnectionException
     * @throws RandomException
     */
    function () {
        $carrier = OnDemandCarrier::getRandomValue();

        $shipment = GoShip::createOnDemandShipment([
            'order_id' => Str::uuid()->toString(),
            'paths' => [
                [
                    'address' => fake()->address(),
                    'name' => fake()->name(),
                    'phone' => fake()->phoneNumber(),
                    'lat' => fake()->latitude(),
                    'lng' => fake()->longitude(),
                    'kind' => Kind::PICKUP,
                ],
                [
                    'address' => fake()->address(),
                    'name' => fake()->name(),
                    'phone' => fake()->phoneNumber(),
                    'lat' => fake()->latitude(),
                    'lng' => fake()->longitude(),
                    'kind' => Kind::DELIVERY,
                    'parcel' => [
                        'name' => fake()->name(),
                        'quantity' => random_int(10, 100),
                        'width' => random_int(10, 100),
                        'weight' => random_int(10, 100),
                        'height' => random_int(10, 100),
                    ],
                ],
            ],
            'carrier' => $carrier,
            'vehicle' => 'BIKE',
            'service' => $carrier === OnDemandCarrier::AHAMOVE ? 'HAN-BIKE' : 'GrabExpress',
            'note' => fake()->sentence(),
            'metadata' => fake()->boolean() ? ['Hàng dễ vỡ, vui lòng nhẹ tay.'] : null,
            'requests' => [[
                '_id' => fake()->randomElement(['HAN-BIKE-ROUND-TRIP', 'HAN-BIKE-BULKY']),
                'tier_code' => Tier::getRandomValue(),
            ]],
        ]);

        expect($shipment)
            ->dump()
            ->toBeArray();
    }
);

it(
    'updateOnDemandShipment must be array',
    /**
     * @throws ConnectionException
     * @throws RandomException
     */
    function () {
        $carrier = OnDemandCarrier::getRandomValue();

        $shipment = GoShip::updateOnDemandShipment('GSNX8EXZLM', [
            'order_id' => Str::uuid()->toString(),
            'paths' => [
                [
                    'address' => fake()->address(),
                    'name' => fake()->name(),
                    'phone' => fake()->phoneNumber(),
                    'lat' => fake()->latitude(),
                    'lng' => fake()->longitude(),
                    'kind' => Kind::PICKUP,
                ],
                [
                    'address' => fake()->address(),
                    'name' => fake()->name(),
                    'phone' => fake()->phoneNumber(),
                    'lat' => fake()->latitude(),
                    'lng' => fake()->longitude(),
                    'kind' => Kind::DELIVERY,
                    'parcel' => [
                        'name' => fake()->name(),
                        'quantity' => random_int(10, 100),
                        'width' => random_int(10, 100),
                        'weight' => random_int(10, 100),
                        'height' => random_int(10, 100),
                    ],
                ],
            ],
            'carrier' => $carrier,
            'vehicle' => 'BIKE',
            'service' => $carrier === OnDemandCarrier::AHAMOVE ? 'HAN-BIKE' : 'GrabExpress',
            'note' => fake()->sentence(),
            'metadata' => fake()->boolean() ? ['Hàng dễ vỡ, vui lòng nhẹ tay.'] : null,
            'requests' => [[
                '_id' => fake()->randomElement(['HAN-BIKE-ROUND-TRIP', 'HAN-BIKE-BULKY']),
                'tier_code' => Tier::getRandomValue(),
            ]],
        ]);

        expect(is_array($shipment))
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

it(
    'deleteOnDemandShipment must be bool',
    /**
     * @throws ConnectionException
     */
    function () {
        $shipment = GoShip::deleteOnDemandShipment('GSNX8EXZLM');

        expect($shipment)
            ->dump()
            ->toBeBool();
    }
);
