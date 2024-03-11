<?php
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel;

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
        $text = 'http://192.168.1.22:443/views/client/index.php?page=order&oid=' . $orderId;
        $qr_code = QrCode::create($text)
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::High)
            ->setSize(300)
            ->setMargin(10)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));
        $label = Label::create('Scan the code')
            ->setTextColor(new Color(255, 0, 0))
            ->setAlignment(LabelAlignment::Center);
        $logo = Logo::create('../client/images/logo.png')
            ->setResizeToWidth(100);
        $writer = new PngWriter();
        $result = $writer->write($qr_code, logo: $label, label: $logo);
        $result->saveToFile('../upload/' . $orderId . '.png');
    }

}