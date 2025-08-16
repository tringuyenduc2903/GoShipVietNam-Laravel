<?php

use BeetechAsia\GoShip\Enums\Carrier;
use BeetechAsia\GoShip\Enums\Payer;
use BeetechAsia\GoShip\Enums\Shipment;
use BeetechAsia\GoShip\Facades\GoShip;

it(
    'verifyWebhook must be bool',
    function () {
        $data = json_encode(fake()->randomElement([[
            'gcode' => 'GS6ZE234V6',
            'code' => 'GAPBLXAE',
            'order_id' => 'SML-003749',
            'weight' => '2360.0000000000005',
            'fee' => '35650',
            'cod' => '0',
            'payer' => '0',
            'status' => '901',
            'status_text' => 'Chờ lấy hàng',
            'message' => 'Chờ shipper qua lấy hàng',
            'tracking_url' => 'https://donhang.ghn.vn/?order_code=GAPBLXAE',
            'description' => 'Shipper đang trên đường đến lấy hàng',
            'sorting_code' => 'GAPBLXAE',
            'return_sorting_code' => 'HN-01-01-TM01',
            'is_return' => 0,
            'is_part_delivery' => 0,
            'is_lost' => 0,
        ], [
            'is_ondemand_shipment' => true,
            'gcode' => 'GS6ZE234V6',
            'code' => 'GAPBLXAE',
            'order_id' => 'SML-003749',
            'fee' => 35650,
            'cod' => 0,
            'status' => 901,
            'message' => 'Chờ shipper qua lấy hàng',
            'description' => 'Chờ shipper qua lấy hàng',
            'tracking_url' => 'https://express.grab.com/track/exampleCode',
            'error' => null,
            'error_txt' => null,
            'cancel_at' => null,
            'pickup_at' => '2025-05-13T09:15:00+07:00',
            'delivery_at' => null,
            'shipper_accept_at' => '2025-05-13T08:45:00+07:00',
            'completed_at' => null,
            'returned_at' => null,
            'paths' => [
                [
                    'uuid' => 'GS123123',
                    'status' => 'Chờ lấy hàng',
                    'tracking_number' => 'GHN12345678',
                    'tracking_url' => 'https://tracking.example.com/GHN12345678',
                    'completed_at' => null,
                    'failed_at' => null,
                    'returned_at' => null,
                    'fail_note' => null,
                ],
                [
                    'uuid' => 'GS234234',
                    'status' => 'Đang giao',
                    'tracking_number' => 'GHN12345679',
                    'tracking_url' => 'https://tracking.example.com/GHN12345679',
                    'completed_at' => null,
                    'failed_at' => null,
                    'returned_at' => null,
                    'fail_note' => null,
                ],
            ],
        ]]));

        $secret_key = config('goshipvietnam.jwt');

        $hashed = hash_hmac('sha256', $data, $secret_key, true);
        $webhook_hmac = base64_encode($hashed);

        $result = GoShip::verifyWebhook($data, $secret_key, $webhook_hmac);

        expect($result)
            ->dump()
            ->toBeBool();
    }
);

it(
    'NormalShipment must be array',
    function () {
        $shipment = Shipment::getRandomValue();
        $label = Shipment::getDescription($shipment);

        expect([$shipment => $label])
            ->dump()
            ->toBeArray();
    }
);

it(
    'NormalCarrier must be array',
    function () {
        $keys = Carrier::getKeys();
        $values = Carrier::getValues();

        expect(array_combine($keys, $values))
            ->dump()
            ->toBeArray();
    }
);

it(
    'Payer must be array',
    function () {
        $keys = Payer::getKeys();
        $values = Payer::getValues();

        expect(array_combine($keys, $values))
            ->dump()
            ->toBeArray();
    }
);
