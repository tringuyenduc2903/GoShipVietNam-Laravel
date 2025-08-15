<?php

use BeetechAsia\GoShip\Facades\GoShip;
use Illuminate\Http\Client\ConnectionException;

it(
    'login must be array',
    /**
     * @throws ConnectionException
     */
    function () {
        $result = GoShip::login([
            'username' => config('goshipvietnam.username'),
            'password' => config('goshipvietnam.password'),
            'client_id' => config('goshipvietnam.client_id'),
            'client_secret' => config('goshipvietnam.client_secret'),
        ]);

        expect($result)->toBeArray();
    }
);

it(
    'refreshToken must be null',
    /**
     * @throws ConnectionException
     */
    function () {
        $result = GoShip::refreshToken([
            'refresh_token' => 'def50200b1d486fb22951095d567988f4f9559dea2660c680f7e134623c2f25f673e2b143c226e5283931d7128ed89a4bf8114496aa79ec86fd1f58417e5d5bf1cf5378f459546948ba599340eef544a22abc788314b4badb546b3fb030c80624d71a07874149c56835526219cbcf1f9b998e8b9264953f8d6e90e632b686d277034ee9bf358a8cab3057e6ba79e9270b84ab99ed17e1e4483832c5df7f06e2b64b739b350b7992f01fa9f137a16a66f1fd74bcca0e288c19ac25a7c7cef3060e195288f6f2f688fc606b2c7cafcc0624e1b84f5ee724ebc9e4f1bdd9dc1bce0f41307ce73cb5a87819a33ae8e3f28452f8f3aa1bac65ad54eb2d454550c1b7229b0cc98c05c4e8b3c5ab6adf517f9f8890c473cbad8b27d94d7a1ccefc1b5d52d9ccfd286b4ec39cd8ce4af92a2c08379528debe94313478463c91823efb1ef4874f786e09a84dd5a0294d1ab941639953c8bb6985c73d4583c90cb540f5dce65a319ff',
            'username' => config('goshipvietnam.username'),
            'password' => config('goshipvietnam.password'),
            'client_id' => config('goshipvietnam.client_id'),
            'client_secret' => config('goshipvietnam.client_secret'),
        ]);

        expect($result)->toBeNull();
    }
);
