<?php

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';


$mail->isSMTP();              
$mail->Host = 'smtp.mail.ru'; 
$mail->SMTPAuth = true;                 
$mail->Username = 'nyura.axmatova@list.ru';       
$mail->Password = 'Atafro5ng';                         
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;                                   
 
$mail->setFrom('nyura.axmatova@list.ru', 'Анна');   
$mail->addAddress('hiladochka@gmail.com');    
$mail->isHTML(true);                                 

$mail->Subject = 'новая заявка с сайта';
$mail->Body    = '
	Пользователь оставил свои данные <br> 
	Имя: ' . $name . ';<br>
	Телефон: ' . $phone . '';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    echo "Error";
} else {
    header('location: ../thankyou.html');
}

?>