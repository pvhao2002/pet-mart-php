<?php
require_once('db.php');
class OrderDAO
{
    private static $instance = NULl;
    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new OrderDAO();
        }
        return self::$instance;
    }

    public function createOrder($userId, $method)
    {
        $sql = "CALL CreateOrder(?, ?)";
        $db = DB::getInstance();
        $req = $db->prepare($sql);
        $req->execute(array($userId, $method));
    }
}