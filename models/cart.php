<?php
class Cart
{
    private $cartId;
    private $userId;
    private $user;
    private $totalPrice;
    private $totalQuantity;

    public function __construct($cartId, $userId, $user, $totalPrice, $totalQuantity)
    {
        $this->cartId = $cartId;
        $this->userId = $userId;
        $this->user = $user;
        $this->totalPrice = $totalPrice;
        $this->totalQuantity = $totalQuantity;
    }

    public function getCartId()
    {
        return $this->cartId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function getTotalQuantity()
    {
        return $this->totalQuantity;
    }

    public function setCartId($cartId)
    {
        $this->cartId = $cartId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    public function setTotalQuantity($totalQuantity)
    {
        $this->totalQuantity = $totalQuantity;
    }

    public static function fromResultSet($resultSet)
    {
        $user = User::fromResultSet($resultSet);

        $cart = new Cart(
            $resultSet['cart_id'],
            $resultSet['user_id'],
            $user,
            $resultSet['total_price'],
            $resultSet['total_quantity']
        );
        return $cart;
    }

}
