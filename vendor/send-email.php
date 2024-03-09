<?php
class SendEmail
{
    private static $instance = NULl;

    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new SendEmail();
        }
        return self::$instance;
    }

    public function send($email, $name, $subject, $body)
    {
        require 'Mail/src/Exception.php';
        require 'Mail/src/PHPMailer.php';
        require 'Mail/src/SMTP.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'hideonbush8405@gmail.com';                     //SMTP username
            $mail->Password = 'nyty qhek wqvo ehkf';                               //SMTP password
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('hideonbush8405@gmail.com', 'Pet mart');
            $mail->addAddress($email, $name);     //Add a recipient

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Encoding = 'base64';  // Set the encoding type
            $mail->CharSet = 'UTF-8';
            $mail->Body = $body;
            $mail->AltBody = $body;
            $mail->send();
            return true;
        } catch (PHPMailer\PHPMailer\Exception $e) {
            return false;
        }
    }

}