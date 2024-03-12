<?php
class Order
{
    private $orderId;
    private $userId;
    private $user;
    private $orderDate;
    private $totalPrice;
    private $totalQuantity;
    private $paymentMethod;
    private $status;
    private $qrCode;
    private $listOrderItems;

    public function __construct($orderId, $userId, $user, $orderDate, $totalPrice, $totalQuantity, $paymentMethod, $status, $qrCode = null)
    {
        $this->orderId = $orderId;
        $this->userId = $userId;
        $this->user = $user;
        $this->orderDate = $orderDate;
        $this->totalPrice = $totalPrice;
        $this->totalQuantity = $totalQuantity;
        $this->paymentMethod = $paymentMethod;
        $this->status = $status;
        $this->qrCode = $qrCode;
    }

    public function getListOrderItems()
    {
        return $this->listOrderItems;
    }

    public function setListOrderItems($listOrderItems)
    {
        $this->listOrderItems = $listOrderItems;
    }

    public function getQrCode()
    {
        return $this->qrCode;
    }

    public function setQrCode($qrCode)
    {
        $this->qrCode = $qrCode;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getOrderDate()
    {
        return $this->orderDate;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function getTotalQuantity()
    {
        return $this->totalQuantity;
    }

    public function getPaymentMethod()
    {
        switch ($this->paymentMethod) {
            case 'VN_PAY':
                return 'VNPay';
            case 'CASH':
                return 'Tiền mặt';
            default:
                return 'Chưa xác định';
        }
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 'processing':
                return 'Đang chuẩn bị hàng';
            case 'completed':
                return 'Đã chuẩn bị hàng. Quý khách vui lòng đến cửa hàng để nhận hàng';
            case 'cancelled':
                return 'Đã hủy';
            case 'refunded':
                return 'Đã hoàn tiền';
            case 'done':
                return 'Đã nhận hàng';
            default:
                return 'Đang chờ xác nhận';
        }
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    public function setTotalQuantity($totalQuantity)
    {
        $this->totalQuantity = $totalQuantity;
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public static function fromResultSet($resultSet)
    {
        $rs = count($resultSet) == 1 ? $resultSet : $resultSet[0];
        $order = new Order(
            $rs['order_id'],
            $rs['user_id'],
            null,
            $rs['created_at'],
            $rs['order_total'],
            $rs['order_quantity'],
            $rs['payment_method'],
            $rs['status'],
            $rs['qr_code']
        );
        
        // loop through the result set and create the list of cart items
        $listOrderItemTemp = [];
        foreach ($resultSet as $item) {
            $orderItemTemp = OrderItem::fromResultSet($item);
            $listOrderItemTemp[] = $orderItemTemp;
        }
        $order->setListOrderItems($listOrderItemTemp);
        return $order;
    }

    public static function fromResultSetV2($resultSet)
    {
        $order = new Order(
            $resultSet['order_id'],
            $resultSet['user_id'],
            null,
            $resultSet['created_at'],
            $resultSet['total_price'],
            $resultSet['total_quantity'],
            $resultSet['payment_method'],
            $resultSet['status'],
            $resultSet['qr_code']
        );
        return $order;
    }
}
