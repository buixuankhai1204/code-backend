<?php

require('phpmailer/phpmailer/src/PHPMailer.php');
require('phpmailer/phpmailer/src/SMTP.php');
require('phpmailer/phpmailer/src/Exception.php');
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\PHPMailer;
        
class sendMail extends PHPMailer {
    
    
    function __construct()
    { 
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Port=587;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username   = 'jshviethoang18@gmail.com';
    $mail->Password   = 'xvrlnowfjyojmhwq';
    $mail->setFrom('khaibuixuan2@gmail.com');
    }
}
$redis = new Redis();
$redis->connect('redis', 6379);
$key = "keys";
$inputName = $_POST['nameEmail'];
$inputTitle = $_POST['titleEmail'];
$inputContent = $_POST['contentEmail'];

$arr=[
    'nameEmail'=>$inputName,
    'titleEmail'=>$inputTitle,
    'contentEmail'=>$inputContent,
];
$redis->set($key, json_encode($arr));


