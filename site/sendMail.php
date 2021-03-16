<?php

require('phpmailer/phpmailer/src/PHPMailer.php');
require('phpmailer/phpmailer/src/SMTP.php');
require('phpmailer/phpmailer/src/Exception.php');
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

class sendMail extends PHPMailer
{
    function __construct()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Port = 587;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username   = 'jshviethoang18@gmail.com';
        $mail->Password   = 'xvrlnowfjyojmhwq';
        $mail->setFrom('khaibuixuan2@gmail.com');
    }
}
$redis = new Redis();
$redis->connect('redis', 6379);
$key = 'key';

$input = [
    'nameEmail' => $_POST['nameEmail'],
    'titleEmail' => $_POST['titleEmail'],
    'contentEmail' => $_POST['contentEmail'],
];
$arr=[];
if ($redis->exists('key')) {
    $arr = json_decode($redis->get('key'));
    
}
    array_push($arr,$input);
    $redis->DEL($key);
    $redis->set($key, json_encode($arr));
