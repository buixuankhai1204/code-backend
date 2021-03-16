<?php
require('phpmailer/phpmailer/src/PHPMailer.php');
require('phpmailer/phpmailer/src/SMTP.php');
require('phpmailer/phpmailer/src/Exception.php');

use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\PHPMailer;

try {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6378);
    $mail = new PHPMailer();
    do {
        if ($redis->get('key')) {
            $array=json_decode($redis->get('key'),true);
            echo '<pre>';
            print_r($array);
            echo '</pre>';
            $inputTitle = $array[0]->nameEmail;
            $inputName = $array[0]->titleEmail;
            $inputContent = $array[0]->contentEmail;
            $mail->addAddress($inputName);
            $mail->Subject = $inputTitle;
            $mail->Body    = $inputContent;
            $mail->send();
            unset($array[0]);
            array_values($array);
            $redis->DEL('key');
            $redis->set('key', json_encode($array));
        }
    } while (true);
} catch (Exception $e) {
    echo $e->getMessage();
}
