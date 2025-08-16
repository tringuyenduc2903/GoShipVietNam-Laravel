<?php

use BeetechAsia\GoShip\Enums\OnDemandShipment;
use BeetechAsia\GoShip\Enums\Shipment;

return [

    Shipment::class => [
        Shipment::NEW => 'Đơn mới (Đơn đã lưu chưa được gửi sang HVC)',
        Shipment::WAITING_FOR_PICKUP => 'Chờ lấy hàng (Chờ HVC điều phối đơn cho bưu tá)',
        Shipment::PICKING_UP => 'Lấy hàng (Bưu tá đang trên đường tới lấy hàng)',
        Shipment::PICKED_UP => 'Đã lấy hàng (Bưu tá đã nhận hàng từ shop)',
        Shipment::DELIVERING => 'Giao hàng (Hàng đang được đi giao cho khách)',
        Shipment::DELIVERED_SUCCESS => 'Giao thành công (Đã giao hàng cho khách thành công)',
        Shipment::DELIVERED_FAILED => 'Giao thất bại (Bưu tá không giao được hàng)',
        Shipment::RETURNING => 'Đang chuyển hoàn (Hàng giao thất bại đang được chuyển ngược trở lại trả shop)',
        Shipment::RETURNED => 'Chuyển hoàn (Hàng giao thất bại gửi trả shop)',
        Shipment::RECONCILED => 'Đã đối soát (Đơn hàng đã thực hiện đối soát với hãng)',
        Shipment::RECONCILED_WITH_CUSTOMER => 'Đã đối soát khách (Đơn hàng đã thực hiện đối soát với khách)',
        Shipment::COD_PAID_TO_CUSTOMER => 'Đã trả COD cho khách (Goship đã chuyển khoản COD cho khách hàng)',
        Shipment::WAITING_FOR_COD_PAYMENT => 'Chờ thanh toán COD (Đơn hàng đã thực hiện thanh toán nhận COD từ hãng)',
        Shipment::COMPLETED => 'Hoàn thành (Đơn hàng Hoàn thành - Kết thúc quá trình chuyển phát)',
        Shipment::CANCELED => 'Đơn hủy (Đơn hàng đã bị hủy - Khách hủy hoặc shop hủy)',
        Shipment::DELAYED_PICKUP_DELIVERY => 'Chậm lấy/giao (Có thể do shop hoặc bưu tá)',
        Shipment::PARTIAL_DELIVERY => 'Giao hàng một phần (Đơn hàng giao hàng một phần)',
        Shipment::LOST => 'Thất lạc hàng (Hàng bị thất lạc trong quá trình vận chuyển)',
        Shipment::IN_STORAGE => 'Đang lưu kho (Hàng đang được lưu kho tại HVC)',
        Shipment::IN_TRANSIT => 'Đang vận chuyển (Hàng đang được vận chuyển đến kho trung chuyển)',
        Shipment::ERROR => 'Đơn lỗi',
    ],

    OnDemandShipment::class => [
        OnDemandShipment::NEW => 'Đơn mới (Đơn đã lưu chưa được gửi sang HVC)',
        OnDemandShipment::SENT => 'Đã gửi đơn (Đơn đã được gửi sang HVC)',
        OnDemandShipment::WAITING_FOR_PICKUP => 'Chờ lấy hàng (Chờ HVC điều phối đơn cho bưu tá)',
        OnDemandShipment::PICKING_UP => 'Đang lấy hàng (Bưu tá đang trên đường tới lấy hàng)',
        OnDemandShipment::PICKED_UP => 'Đã lấy hàng (Bưu tá đã nhận hàng từ shop)',
        OnDemandShipment::DELIVERING => 'Giao hàng (Hàng đang được đi giao cho khách)',
        OnDemandShipment::DELIVERED_SUCCESS => 'Giao thành công (Đã giao hàng cho khách thành công)',
        OnDemandShipment::DELIVERED_FAILED => 'Đơn hàng bị huỷ (Bưu tá không giao được hàng hoặc huỷ đơn, giao thất bại)',
        OnDemandShipment::RETURNING => 'Đang chuyển hoàn (Hàng giao thất bại đang được chuyển ngược trở lại trả shop)',
        OnDemandShipment::RETURNED => 'Đã hoàn hàng (Hàng giao thất bại đã gửi trả shop)',
        OnDemandShipment::COMPLETED => 'Hoàn thành (Đơn hàng Hoàn thành - Kết thúc quá trình chuyển phát)',
        OnDemandShipment::CANCELED => 'Đơn hủy (Đơn hàng đã bị hủy - Khách hủy hoặc shop hủy)',
        OnDemandShipment::ERROR => 'Đơn lỗi (Lỗi khi gửi đơn sang hãng vận chuyển)',
    ],

];
