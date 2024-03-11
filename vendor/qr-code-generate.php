<?php

class QRCodeGenerate
{
    private static $instance = NULl;

    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new QRCodeGenerate();
        }
        return self::$instance;
    }

    public function generate($orderId)
    {
        include "phpqrcode/qrlib.php";
        QRcode::png($orderId, '../uploads/image.png');
    }

}