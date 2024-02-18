<?
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

    public function __construct($orderId, $userId, $user, $orderDate, $totalPrice, $totalQuantity, $paymentMethod, $status)
    {
        $this->orderId = $orderId;
        $this->userId = $userId;
        $this->user = $user;
        $this->orderDate = $orderDate;
        $this->totalPrice = $totalPrice;
        $this->totalQuantity = $totalQuantity;
        $this->paymentMethod = $paymentMethod;
        $this->status = $status;
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
        return $this->paymentMethod;
    }

    public function getStatus()
    {
        return $this->status;
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
        $user = User::fromResultSet($resultSet);

        $order = new Order(
            $resultSet['order_id'],
            $resultSet['user_id'],
            $user,
            $resultSet['created_at'],
            $resultSet['total_price'],
            $resultSet['total_quantity'],
            $resultSet['payment_method'],
            $resultSet['status']
        );
        return $order;
    }

}
