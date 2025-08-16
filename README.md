# GoShip SDK for Laravel framework (Only Vietnam Support)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tringuyenduc2903/goshipvietnam-laravel.svg?style=flat-square)](https://packagist.org/packages/tringuyenduc2903/goshipvietnam-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/tringuyenduc2903/goshipvietnam-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/tringuyenduc2903/goshipvietnam-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/tringuyenduc2903/goshipvietnam-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/tringuyenduc2903/goshipvietnam-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tringuyenduc2903/goshipvietnam-laravel.svg?style=flat-square)](https://packagist.org/packages/tringuyenduc2903/goshipvietnam-laravel)

## Installation

You can install the package via composer:

```bash
composer require tringuyenduc2903/goshipvietnam-laravel
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="goshipvietnam-config"
```

This is the contents of the published config file:

```php
return [
    'url' => env('GOSHIP_API_URL', 'https://api.goship.io/api/v2'),
    'jwt' => env('GOSHIP_JWT', ''),
    'username' => env('GOSHIP_USERNAME', ''),
    'password' => env('GOSHIP_PASSWORD', ''),
    'client_id' => env('GOSHIP_CLIENT_ID', ''),
    'client_secret' => env('GOSHIP_CLIENT_SECRET', ''),
];
```

#### Giải thích

- **url**: Môi trường phát triển tích hợp (**Sandbox**: https://sandbox.goship.io/api/v2,
  **Production**: https://api.goship.io/api/v2)
- **jwt**: Access Token (Sử dụng cho Phương thức
  _[Lấy Access Token trực tiếp](https://doc.goship.io/getting-started/installation#_1-l%E1%BA%A5y-access-token-tr%E1%BB%B1c-ti%E1%BA%BFp)_)
- **username**: Email (Sử dụng cho Phương thức
  _[Sử dụng tài khoản developer](https://doc.goship.io/getting-started/installation#_2-s%E1%BB%AD-d%E1%BB%A5ng-t%C3%A0i-kho%E1%BA%A3n-developer)_)
- **password**: Mật khẩu (Sử dụng cho Phương thức
  _[Sử dụng tài khoản developer](https://doc.goship.io/getting-started/installation#_2-s%E1%BB%AD-d%E1%BB%A5ng-t%C3%A0i-kho%E1%BA%A3n-developer)_)
- **client_id**: Client ID (Sử dụng cho Phương thức
  _[Sử dụng tài khoản developer](https://doc.goship.io/getting-started/installation#_2-s%E1%BB%AD-d%E1%BB%A5ng-t%C3%A0i-kho%E1%BA%A3n-developer)_)
- **client_secret**: Client secret (Sử dụng cho
  _[Xác thực webhook](https://doc.goship.io/api/shipment/webhooks#x%C3%A1c-th%E1%BB%B1c-webhook)_ và Phương thức
  _[Sử dụng tài khoản developer](https://doc.goship.io/getting-started/installation#_2-s%E1%BB%AD-d%E1%BB%A5ng-t%C3%A0i-kho%E1%BA%A3n-developer)_)

#### File .env:

- Đối
  với
  _[Lấy Access Token trực tiếp](https://doc.goship.io/getting-started/installation#_1-l%E1%BA%A5y-access-token-tr%E1%BB%B1c-ti%E1%BA%BFp)_:

```dotenv
GOSHIP_API_URL=https://api.goship.io/api/v2
GOSHIP_JWT=
GOSHIP_CLIENT_SECRET=
```

- Đối
  với
  _[Sử dụng tài khoản developer](https://doc.goship.io/getting-started/installation#_2-s%E1%BB%AD-d%E1%BB%A5ng-t%C3%A0i-kho%E1%BA%A3n-developer)_:

```dotenv
GOSHIP_API_URL=https://api.goship.io/api/v2
GOSHIP_USERNAME=
GOSHIP_PASSWORD=
GOSHIP_CLIENT_ID=
GOSHIP_CLIENT_SECRET=
```

## Usage

### [Đăng nhập](https://doc.goship.io/getting-started/authentication#login)

```php
use BeetechAsia\GoShip\Facades\GoShip;

$data = [
    'username' => config('goshipvietnam.username'),
    'password' => config('goshipvietnam.password'),
    'client_id' => config('goshipvietnam.client_id'),
    'client_secret' => config('goshipvietnam.client_secret'),
];
GoShip::login($data);
```

### [Lấy tất cả tỉnh/thành phố](https://doc.goship.io/api/shipment/city#l%E1%BA%A5y-t%E1%BA%A5t-c%E1%BA%A3-t%E1%BB%89nhth%C3%A0nh-ph%E1%BB%91)

```php
use BeetechAsia\GoShip\Facades\GoShip;

GoShip::getCities();
```

### [Lấy danh sách quận/huyện theo mã tỉnh/thành phố](https://doc.goship.io/api/shipment/city#l%E1%BA%A5y-danh-s%C3%A1ch-qu%E1%BA%ADnhuy%E1%BB%87n-theo-m%C3%A3-t%E1%BB%89nhth%C3%A0nh-ph%E1%BB%91)

```php
use BeetechAsia\GoShip\Facades\GoShip;

$cityId = 100000;
GoShip::getDistrictsByCityId($cityId);
```

### [Lấy danh sách quận/huyện](https://doc.goship.io/api/shipment/district#l%E1%BA%A5y-danh-s%C3%A1ch-qu%E1%BA%ADnhuy%E1%BB%87n)

```php
use BeetechAsia\GoShip\Facades\GoShip;

GoShip::getDistricts();
```

### [Lấy tất cả phường/xã theo mã quận/huyện](https://doc.goship.io/api/shipment/district#l%E1%BA%A5y-t%E1%BA%A5t-c%E1%BA%A3-ph%C6%B0%E1%BB%9Dngx%C3%A3-theo-m%C3%A3-qu%E1%BA%ADnhuy%E1%BB%87n)

```php
use BeetechAsia\GoShip\Facades\GoShip;

$districtId = 100100;
GoShip::getWardsByDistrictId($districtId);
```

### [Lấy danh sách khách hàng](https://doc.goship.io/api/shipment/customer#l%E1%BA%A5y-danh-s%C3%A1ch-kh%C3%A1ch-h%C3%A0ng)

```php
use BeetechAsia\GoShip\Facades\GoShip;

GoShip::getCustomers();
```

### [Tìm kiếm một khách hàng](https://doc.goship.io/api/shipment/customer#t%C3%ACm-ki%E1%BA%BFm-m%E1%BB%99t-kh%C3%A1ch-h%C3%A0ng)

```php
use BeetechAsia\GoShip\Facades\GoShip;

$q = 'nguyenvana@gmail.com'; // q có thể nhận giá trị của các trường id, name, email hoặc phone.
GoShip::searchCustomer($q);
```

### [Tạo mới một khách hàng](https://doc.goship.io/api/shipment/customer#t%E1%BA%A1o-m%E1%BB%9Bi-m%E1%BB%99t-kh%C3%A1ch-h%C3%A0ng)

```php
use BeetechAsia\GoShip\Facades\GoShip;

$data = [
    'name' => 'Trần Văn C',
    'email' => 'tranvanc@gmail.com', // Không bắt buộc
    'phone' => '0902001002',
    'address' => [
        'street' => '1102 Hàng Khay',
        'district' => '100100',
        'city' => '100000',
    ],
];
GoShip::createCustomer($data);
```

### [Cập nhật thông tin khách hàng](https://doc.goship.io/api/shipment/customer#c%E1%BA%ADp-nh%E1%BA%ADt-th%C3%B4ng-tin-kh%C3%A1ch-h%C3%A0ng)

```php
use BeetechAsia\GoShip\Facades\GoShip;

$data = [
    'name' => 'Trần Văn C',
    'email' => 'tranvanc@gmail.com', // Không bắt buộc
    'phone' => '0902001002',
];
GoShip::updateCustomer($data);
```

### [Xóa thông tin khách hàng](https://doc.goship.io/api/shipment/customer#x%C3%B3a-th%C3%B4ng-tin-kh%C3%A1ch-h%C3%A0ng)

```php
use BeetechAsia\GoShip\Facades\GoShip;

$customerId = 'elpomgr8';
GoShip::deleteCustomer('elpomgr8');
```

### [Lấy biểu phí vận chuyển](https://doc.goship.io/api/shipment/rate)

```php
use BeetechAsia\GoShip\Facades\GoShip;

$data = [
    'shipment' => [
        'address_from' => [
            'district' => '100100',
            'city' => '100000',
        ],
        'address_to' => [
            'district' => '100100',
            'city' => '100000',
        ],
        'parcel' => [
            'cod' => 500000, // Không bắt buộc
            'amount' => 500000, // Không bắt buộc
            'width' => 10,
            'height' => 10,
            'length' => 10,
            'weight' => 750,
        ],
    ],
];
GoShip::getRates($data);
```

### [Danh sách Vận đơn](https://doc.goship.io/api/shipment/shipment#danh-s%C3%A1ch-v%E1%BA%ADn-%C4%91%C6%A1n)

```php
use BeetechAsia\GoShip\Facades\GoShip;

GoShip::getShipments();
```

### [Tìm kiếm Vận đơn](https://doc.goship.io/api/shipment/shipment#t%C3%ACm-ki%E1%BA%BFm-shipment)

```php
use BeetechAsia\GoShip\Facades\GoShip;

// Tìm kiếm theo id, order_id hoặc carrier_code
$q = 'GS8KOV152L';
GoShip::searchShipment($q);

// Tìm kiếm theo thời gian bắt đầu và thời gian kết thúc
$start_date = '2025-08-08';
$end_date = '2025-08-15';
GoShip::searchShipment(start_date: $start_date, end_date: $end_date);
```

### [Tạo mới Vận đơn](https://doc.goship.io/api/shipment/shipment#t%E1%BA%A1o-m%E1%BB%9Bi-v%E1%BA%ADn-%C4%91%C6%A1n)

```php
use BeetechAsia\GoShip\Enums\Payer;
use BeetechAsia\GoShip\Facades\GoShip;

$data = [
    'shipment' => [
        'rate' => 'MTRfMTFfMTAwMg==',
        'payer' => Payer::CUSTOMER,
        'order_id' => '02846e55e191c5706a5021191563c2a6',
        'address_from' => [
            'name' => 'Nguyễn Văn A',
            'phone' => '0913131313',
            'street' => '195 Đ. Thạch Bàn',
            'ward' => '64',
            'district' => '100100',
            'city' => '100000',
        ],
        'address_to' => [
            'name' => 'Trần Văn B',
            'phone' => '0912121212',
            'street' => '51 Lê Đại Hành',
            'ward' => '63',
            'district' => '100100',
            'city' => '100000',
        ],
        'parcel' => [
            'cod' => 500000, // Không bắt buộc
            'amount' => 500000, // Không bắt buộc
            'width' => 10,
            'height' => 10,
            'length' => 10,
            'weight' => 750,
            'metadata' => 'Hàng dễ vỡ, vui lòng nhẹ tay.', // Không bắt buộc
        ],
    ],
];
GoShip::createShipment($data);
```

### [Xóa Vận đơn](https://doc.goship.io/api/shipment/shipment#x%C3%B3a-v%E1%BA%ADn-%C4%91%C6%A1n)

```php
use BeetechAsia\GoShip\Facades\GoShip;

$shipmentId = 'GS6AYEDVZ6';
GoShip::deleteShipment($shipmentId);
```

### [Danh sách các phiên đối soát COD](https://doc.goship.io/api/shipment/invoice#danh-s%C3%A1ch-c%C3%A1c-phi%C3%AAn-%C4%91%E1%BB%91i-so%C3%A1t)

```php
use BeetechAsia\GoShip\Facades\GoShip;

GoShip::getInvoices();
```

### [Tìm kiếm phiên đối soát COD](https://doc.goship.io/api/shipment/invoice#t%C3%ACm-ki%E1%BA%BFm-phi%C3%AAn-%C4%91%E1%BB%91i-so%C3%A1t-cod)

```php
use BeetechAsia\GoShip\Facades\GoShip;

// Tìm kiếm theo mã phiên đối soát COD
$code = 'FA13HEUD';
GoShip::searchInvoice($code);

// Tìm kiếm theo thời gian bắt đầu và thời gian kết thúc
$from = '2025-08-08';
$to = '2025-08-15';
GoShip::searchInvoice(from: $from, to: $to);
```

### [Tìm kiếm danh sách Vận đơn theo mã phiên đối soát COD](https://doc.goship.io/api/shipment/invoice#t%C3%ACm-ki%E1%BA%BFm-danh-s%C3%A1ch-v%E1%BA%ADn-%C4%91%C6%A1n-theo-m%C3%A3-phi%C3%AAn-chuy%E1%BB%83n-cod)

```php
use BeetechAsia\GoShip\Facades\GoShip;

$invoiceId = 'HDF9D9SS';
GoShip::getShipmentByInvoiceId($invoiceId);
```

### [Lấy tất cả thông tin giao dịch](http://doc.goship.io/api/shipment/transaction#l%E1%BA%A5y-t%E1%BA%A5t-c%E1%BA%A3-th%C3%B4ng-tin)

```php
use BeetechAsia\GoShip\Facades\GoShip;

GoShip::getTransactions();
```

### [Tìm kiếm giao dịch](https://doc.goship.io/api/shipment/transaction#t%C3%ACm-ki%E1%BA%BFm-giao-d%E1%BB%8Bch)

```php
use BeetechAsia\GoShip\Facades\GoShip;

// Tìm kiếm theo mã giao dịch
$code = 'GSox6or6q5';
GoShip::searchTransaction($code)

// Tìm kiếm theo thời gian bắt đầu và thời gian kết thúc
$from = '2025-08-08';
$to = '2025-08-15';
GoShip::searchTransaction(from: $from, to: $to);
```

### [Xác thực webhook](https://doc.goship.io/api/shipment/webhooks#x%C3%A1c-th%E1%BB%B1c-webhook)

Giới thiệu: Hàm trả về giá trị boolean (true/false)

**true**: Giá trị băm hợp lệ

**false**: Giá trị băm không hợp lệ

```php
use BeetechAsia\GoShip\Facades\GoShip;

GoShip::verifyWebhook();
```

### [Lấy biểu phí vận chuyển Đơn giao hoả tốc](https://doc.goship.io/api/ondemand-shipment/rate)

```php
use BeetechAsia\GoShip\Enums\Kind;
use BeetechAsia\GoShip\Facades\GoShip;

$data = [
    'paths' => [
        [
            'lat' => 20.9842552,
            'lng' => 105.8609381,
            'kind' => Kind::PICKUP,
        ],
        [
            'lat' => 20.9895958,
            'lng' => 105.8445432,
            'kind' => Kind::DELIVERY,
            'parcel' => [
                'cod_amount' => 500000, // Không bắt buộc
                'amount' => 500000, // Không bắt buộc
                'name' => 'Tủ gỗ',
                'quantity' => 20,
                'width' => 20,
                'weight' => 200,
            ],
        ],
    ],
];
GoShip::getOnDemandRates($data);
```

### [Danh sách Vận đơn Đơn giao hoả tốc](https://doc.goship.io/api/ondemand-shipment/shipment#danh-s%C3%A1ch-v%E1%BA%ADn-%C4%91%C6%A1n)

```php
use BeetechAsia\GoShip\Facades\GoShip;

GoShip::getOnDemandShipments();
```

### [Tìm kiếm Vận đơn Đơn giao hoả tốc](https://doc.goship.io/api/ondemand-shipment/shipment#t%C3%ACm-ki%E1%BA%BFm-shipment)

```php
use BeetechAsia\GoShip\Facades\GoShip;

// Tìm kiếm theo id, order_id
$q = '56GDG8F';
GoShip::searchOnDemandShipment($q);

// Tìm kiếm theo thời gian bắt đầu và thời gian kết thúc
$start_date = '2025-08-08';
$end_date = '2025-08-15';
GoShip::searchOnDemandShipment(start_date: $start_date, end_date: $end_date);
```

### [Tạo mới Vận đơn Đơn giao hoả tốc](https://doc.goship.io/api/ondemand-shipment/shipment#t%E1%BA%A1o-m%E1%BB%9Bi-v%E1%BA%ADn-%C4%91%C6%A1n)

```php
use BeetechAsia\GoShip\Enums\Kind;
use BeetechAsia\GoShip\Enums\OnDemandCarrier;
use BeetechAsia\GoShip\Enums\Tier;
use BeetechAsia\GoShip\Facades\GoShip;

$data = [
    'order_id' => '02846e55e191c5706a5021191563c2a6',
    'paths' => [
        [
            'address' => 'Ngõ 371 Phố Vũ Tông Phan, Phường Khương Đình, Quận Thanh Xuân, Hà Nội, Việt Nam',
            'name' => 'Nguyễn Văn A',
            'phone' => '0913131313',
            'lat' => 20.9842552,
            'lng' => 105.8609381,
            'kind' => Kind::PICKUP,
        ],
        [
            'address' => '300 Đ. Giải Phóng, Phương Liệt, Hai Bà Trưng, Hà Nội, Việt Nam',
            'name' => 'Trần Văn B',
            'phone' => '0912121212',
            'lat' => 20.9895958,
            'lng' => 105.8445432,
            'kind' => Kind::DELIVERY,
            'parcel' => [
                'name' => 'Tủ gỗ',
                'quantity' => 1,
                'quantity' => 20,
                'width' => 20,
                'weight' => 200,
            ],
        ],
    ],
    'carrier' => OnDemandCarrier::AHAMOVE,
    'vehicle' => 'BIKE',
    'service' => 'HAN-BIKE', // Ahamove: HAN-BIKE, Grab: GrabExpress
    'note' => 'Để vào tủ đồ ở sảnh chung cư (Đến nơi liên hệ KH để lấy mã)' // Nếu không có ghi chú, đặt giá trị là chuỗi rỗng (empty string)
    'metadata' => ['Hàng dễ vỡ, vui lòng nhẹ tay.'], // Không bắt buộc
    /*
     * Áp dụng cho Ahamove
     * HAN-BIKE-ROUND-TRIP: Tài xế sẽ quay lại điểm lấy hàng với số phí bằng 80% phí khoảng cách. Lưu ý: Phí khoảng cách là số phí dựa theo số km vận chuyển, ko bao gồm phí điểm dừng và các loại phí khác.
     * HAN-BIKE-BULKY: Giao hàng cồng kềnh
     *             | Kích thước    | Cân nặng    | Mức phí
     *      TIER_2:| 60x50x60 (cm) | 40kg        | 10.000 VND
     *      TIER_3:| 70x60x70 (cm) | 60kg        | 20.000 VND
     *      TIER_4:| 90x70x90 (cm) | 80kg        | 40.000 VND
     */
    'requests' => [[
        '_id' => 'HAN-BIKE-BULKY',
        'tier_code' => Tier::TIER_2,
    ]],
];
GoShip::createOnDemandShipment($data);
```

### [Sửa thông tin Vận đơn Đơn giao hoả tốc](https://doc.goship.io/api/ondemand-shipment/shipment#s%E1%BB%ADa-th%C3%B4ng-tin-v%E1%BA%ADn-%C4%91%C6%A1n)

```php
use BeetechAsia\GoShip\Enums\Kind;
use BeetechAsia\GoShip\Enums\OnDemandCarrier;
use BeetechAsia\GoShip\Enums\Tier;
use BeetechAsia\GoShip\Facades\GoShip;

$shipmentId = '56GDG8F';
$data = [
    'order_id' => '02846e55e191c5706a5021191563c2a6',
    'paths' => [
        [
            'address' => 'Ngõ 371 Phố Vũ Tông Phan, Phường Khương Đình, Quận Thanh Xuân, Hà Nội, Việt Nam',
            'name' => 'Nguyễn Văn A',
            'phone' => '0913131313',
            'lat' => 20.9842552,
            'lng' => 105.8609381,
            'kind' => Kind::PICKUP,
        ],
        [
            'address' => '300 Đ. Giải Phóng, Phương Liệt, Hai Bà Trưng, Hà Nội, Việt Nam',
            'name' => 'Trần Văn B',
            'phone' => '0912121212',
            'lat' => 20.9895958,
            'lng' => 105.8445432,
            'kind' => Kind::DELIVERY,
            'parcel' => [
                'name' => 'Tủ gỗ',
                'quantity' => 1,
                'quantity' => 20,
                'width' => 20,
                'weight' => 200,
            ],
        ],
    ],
    'carrier' => OnDemandCarrier::AHAMOVE,
    'vehicle' => 'BIKE',
    'service' => 'HAN-BIKE', // Ahamove: HAN-BIKE, Grab: GrabExpress
    'note' => 'Để vào tủ đồ ở sảnh chung cư (Đến nơi liên hệ KH để lấy mã)' // Nếu không có ghi chú, đặt giá trị là chuỗi rỗng (empty string)
    'metadata' => ['Hàng dễ vỡ, vui lòng nhẹ tay.'], // Không bắt buộc
    /*
     * Áp dụng cho Ahamove
     * HAN-BIKE-ROUND-TRIP: Tài xế sẽ quay lại điểm lấy hàng với số phí bằng 80% phí khoảng cách. Lưu ý: Phí khoảng cách là số phí dựa theo số km vận chuyển, ko bao gồm phí điểm dừng và các loại phí khác.
     * HAN-BIKE-BULKY: Giao hàng cồng kềnh
     *             | Kích thước    | Cân nặng    | Mức phí
     *      TIER_2:| 60x50x60 (cm) | 40kg        | 10.000 VND
     *      TIER_3:| 70x60x70 (cm) | 60kg        | 20.000 VND
     *      TIER_4:| 90x70x90 (cm) | 80kg        | 40.000 VND
     */
    'requests' => [[
        '_id' => 'HAN-BIKE-BULKY',
        'tier_code' => Tier::TIER_2,
    ]],
];
GoShip::updateOnDemandShipment($shipmentId, $data);
```

### [Xóa Vận đơn Đơn giao hoả tốc](https://doc.goship.io/api/ondemand-shipment/shipment#x%C3%B3a-v%E1%BA%ADn-%C4%91%C6%A1n)

```php
use BeetechAsia\GoShip\Facades\GoShip;

$shipmentId = '56GDG8F';
GoShip::deleteOnDemandShipment($shipmentId);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](https://github.com/tringuyenduc2903/GoShipVietNam-Laravel/security/policy) on how to
report security vulnerabilities.

## Credits

- [Tri Nguyen Duc (Bee Tech - PHP)](https://github.com/tringuyenduc2903)
- [All Contributors](https://github.com/tringuyenduc2903/GoShipVietNam-Laravel/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
