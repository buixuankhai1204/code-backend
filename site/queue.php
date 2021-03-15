<?php
require('phpmailer/phpmailer/src/PHPMailer.php');
require('phpmailer/phpmailer/src/SMTP.php');
require('phpmailer/phpmailer/src/Exception.php');
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\PHPMailer;
try {
    $redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$key = "keys";
$mail=new PHPMailer();
do {
    if ($redis->get($key)) {
        $inputName=$redis->get($key)->nameEmail;
        $inputTitle=$redis->get($key)->nameEmail;
        $inputName=$redis->get($key)->nameEmail;
        $output = $redis->get($key);
        $mail->addAddress($inputName);
        $mail->Subject = $inputTitle;
        $mail->Body    = $inputContent;
        $mail->send();
        $redis->DEL($key);
        
    }
    echo"ok";
} while (true);
} catch (Exception $e) {
    echo $e->getMessage();
}

