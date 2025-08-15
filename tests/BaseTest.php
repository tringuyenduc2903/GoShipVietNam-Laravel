<?php

use BeetechAsia\GoShip\Facades\GoShip;

it(
    'verifyWebhook must be bool',
    function () {
        $data = json_encode([
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
        ]);

        $secret_key = config('goshipvietnam.jwt');

        $hashed = hash_hmac('sha256', $data, $secret_key, true);
        $webhook_hmac = base64_encode($hashed);

        $result = GoShip::verifyWebhook($data, $secret_key, $webhook_hmac);

        expect($result)
            ->dump()
            ->toBeBool();
    }
);
