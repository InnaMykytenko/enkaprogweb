<?php

//http://www.agroturystykanadrzeczka.tnb.pl

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$issues = $_POST['issues'];
$send = $_POST['send'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'i.mykytenko7@gmail.com'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'Credex1966'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('i.mykytenko7@gmail.com'); // от кого будет уходить письмо?
$mail->addAddress('mykytenko@enkaprogweb.com');     // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с тестового сайта';
$mail->Body    = '' .$name . ' оставил заявку, его мейл ' .$email. '<br>Телефон этого пользователя: ' .$phone. '<br>Subject этого пользователя: ' .$subject.'<br>Subject этого пользователя: ' .$issues;
$mail->AltBody = '';



if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.php#services');
}






